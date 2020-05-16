<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PostsExport;
use App\Post;
use Maatwebsite\Excel\Facades\Excel;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Requests\ExcelRequest;

class CsvController extends Controller
{
    public function importExportView(){

        return view('vendor/voyager/csv/import');
    }

    public function export(){

        return Excel::download(new PostsExport, 'posts.xlsx');
    }

    public function import(ExcelRequest $request){

        $rows = [
            'id'                => 'id',
            'iframe'            => 'iframe',
            'image'             => 'image',
            'seo_title'         => 'seo_title',
            'meta_description'  => 'meta_description',
            'meta_keywords'     => 'meta_keywords'
        ];

        $data = (new FastExcel)->import($request->file('file'), function ($line)  use($rows, $request){

            if(isset($line['id'])){
                $update_data            = $line;

                unset($update_data['id']);

                Post::where('id', $line['id']) -> update(
                    $update_data
                );
            } else {
                $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyz'; //набор символов для создания случайного slug

                $exelPost               = Post::create([
                        'iframe'            => $line['iframe'],
                        'image'             => $line['image'],
                        'seo_title'         => $line['seo_title'],
                        'meta_description'  => $line['meta_description'],
                        'meta_keywords'     => $line['meta_keywords'],
                        'slug'              => $this -> translit($line['seo_title']),
                        'status'            => 'PENDING'
                    ]
                );
                $exelPost -> save();
            }
        });
        return redirect()->back();
    }

    public function translit($s) {
        $s = (string) $s; // преобразуем в строковое значение
        $s = strip_tags($s); // убираем HTML-теги
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
        $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
        return $s; // возвращаем результат
    }
}
