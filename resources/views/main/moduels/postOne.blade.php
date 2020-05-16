<div class="row">
    <div class="col-2">
    </div>
    <div class="col-6">
        <section class="pt-3 pb-5" id="main_popular">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 ml-md-5">
                    <div class="card popular--card">
                        <img class="card-img-top" alt="{{ $index->title }}" src="storage/{{ $index->image }}" />
                    </div>
                    <div class="card-body px-0">
                        {{ $index->title  }}
                        <hr>
                        @php echo  $index->iframe @endphp
                        <hr>
                        @php echo $index->body  @endphp
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-2">
    </div>
</div>
