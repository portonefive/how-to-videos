<script src="//fast.wistia.com/assets/external/E-v1.js" async></script>
<link rel="stylesheet" href="/vendor/how-to-videos/assets/css/how-to-videos.css" />

<div class="wrap">

    <h1>How-To Videos</h1>

    <div class="how-to-videos">
        @foreach($videos as $video)
            <div class="video">

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
