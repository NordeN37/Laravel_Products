<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use TCG\Voyager\Traits\Resizable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use File;

class Post extends Model
{
    use Resizable;

    protected $fillable = [
        'id',
        'author_id',
        'category_id',
        'title',
        'seo_title',
        'excerpt',
        'body',
        'image',
        'slug',
        'meta_description',
        'meta_keywords',
        'status',
        'featured',
        'views',
        'multi_images',
        'youtube',
        'iframe',
        'blockquote',
        'preview',
        'original_link',
        'allow_comments',
        'event_start',
        'result',
        'activate_at'
    ];

    protected $casts = [

    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function athletes()
    {
        return $this->belongsToMany('App\Athlete', 'post_athlete');
    }

    public function categories(){
        return $this->belongsToMany('App\Category', 'posts_categories');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function viewsFormated(){
        $views = $this->views;

        if($views > 100000){
            $views = floor($views / 100000).'M';
        }
        if($views > 1000){
            $views = floor($views / 1000).'K';
        }
        return $views;
    }

    public function path(){
        return '/post/'.$this->slug;
    }

    public function createdAtFormated(){
        $carbon = new Carbon($this->created_at, 'Europe/Moscow');
        $carbon->locale('ru');
        $return = $carbon->format('d').' '. $carbon->getTranslatedShortMonthName('Do MMMM').' '.$carbon->isoFormat('Y').' '.$carbon->isoFormat('HH:mm');

        if($carbon->format('Y-m-d') == date('Y-m-d'))
            $return = __('today').' '.$carbon->isoFormat('HH:mm');

        if($carbon->format('Y-m-d') == date('Y-m-d', strtotime(date('Y-m-d').' -1 day')))
            $return = __('yestoday').' '.$carbon->isoFormat('HH:mm');

        return $return;
    }

    public function datetimeFormated(){
        $carbon = new Carbon($this->created_at, 'Europe/Moscow');
        $carbon->locale('ru');
        return $carbon->format('Y-m-d').'T'.$carbon->isoFormat('HH:mm');
    }

    public function datetimeToRFC822(){
        $carbon = new Carbon($this->created_at, 'Europe/Moscow');
        $carbon->locale('ru');
        return $carbon->toRfc2822String();
    }

    public function EventStartToC(){
        $carbon = new Carbon($this->event_start, 'Europe/Moscow');
        $carbon->locale('ru');
        return $carbon->format('c');
    }

    public function imageSize($image){
        $exists = Storage::disk('public')->exists($image);
        return ($exists) ? Storage::disk('public')->size( $image) : 0;
    }


    public function scopeSearch($query, $search){
        if (!$search) {
            return $query;
        }
        return $query->whereRaw('searchtext @@ plainto_tsquery(\'russian\', ?)', [$search])
            ->orderByRaw('ts_rank(searchtext, plainto_tsquery(\'russian\', ?)) DESC', [$search]);
    }

    public function getOriginalLink(){
        $return = array(
            'link'  => '',
            'ancor' => ''
        );
        if( !is_null($this->original_link)){
            $data               = explode('|', $this->original_link, 2);
            $return['link']     = $data[0];
            $sl_arr             = array('https://', 'http://');
            $to_arr             = array('', '');
            $return['ancor']    = (count($data) > 1) ? $data[1] : str_replace($sl_arr, $to_arr, $data[0]);
        }
        return $return;
    }


    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function limitedResult($limit = 50){
        $return     = '';
        $dataArray  = explode('</tr>', $this->result);
        if( is_array($dataArray) && count($dataArray) > 1){
            for($i = 0; $i < $limit && $i < count($dataArray); $i ++){
                $return .= $dataArray[$i];
                if( (count($dataArray) -1) != $i)
                    $return .= '</tr>';
            }

            if( $limit < count($dataArray) ){
                $return .= '</tr></tbody></table><div class="table_blur"></div></div>';
            }

        }else{
            $return = $this->result;
        }

        //dd($limit,$return);
        return $return;

    }


    function getSslPage($url, $direct = false, $headers = false, $DBG = false) {

        $ch = curl_init();
        if($direct) {
            curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        if($direct){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($ch, CURLOPT_HEADER,false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $result = curl_exec($ch);

        if ($DBG && $direct) {
            $info = curl_getinfo($ch, CURLINFO_HEADER_OUT);
            dump('curl headers:');
            dump($info);
            //dd($result);
        }

        curl_close($ch);

        return $result;
    }

    function clean_search_string( $s ) {
        $s = preg_replace( "/[^\wa-zA-ZА-Яа-я0-9\s]/iu", '', $s );
        return $s;
    }

}
