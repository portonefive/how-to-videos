<script src="//fast.wistia.com/assets/external/E-v1.js" async></script>

<div class="wrap how-to-videos">

    <h1>How-To Videos</h1>

    <div class="row">
        @foreach($videos as $video)
            <div class="columns small-12 medium-6 large-4">

                <script src="//fast.wistia.com/embed/medias/{{ $video->hashed_id }}.jsonp" async></script>

                <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                    <div class="wistia_responsive_wrapper"
                            style="height:100%;left:0;position:absolute;top:0;width:100%;">
                        <div class="wistia_embed wistia_async_{{ $video->hashed_id }} seo=false videoFoam=true"
                                style="height:100%;width:100%">&nbsp;</div>
                    </div>
                </div>

                <h2>{{ $video->name }}</h2>
            </div>
        @endforeach
    </div>

</div>
