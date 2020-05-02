<style>
    .example,
    .example2,
    .example3 {
        margin: 50px auto 0;
        width: 390px;
        padding-bottom: 50px;
    }

    .player {
        background: #f09f8b;
        height: 220px;
        position: relative;
        width: 100%;
        z-index: 2;
    }

    .title,
    .artist {
        font-family: verdana;
        left: 167px;
        position: absolute;

        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }

    .title {
        color: #ffffff;
        font-size: 14px;
        font-weight: bold;
        top: 23px;
    }

    .artist {
        color: #eeeeee;
        font-size: 12px;
        top: 40px;
    }

    .pl {
        background: url(/img/player/playlist.png) no-repeat;
        cursor: pointer;
        height: 40px;
        left: 330px;
        position: absolute;
        top: 20px;
        width: 39px;
    }

    .pl:hover {
        top: 21px;
    }

    .cover {
        border-radius: 5px 5px 5px 5px;
        height: 94px;
        left: 20px;
        position: absolute;
        top: 30px;
        width: 94px;
    }

    .controls {
        cursor: pointer;
        left: 0px;
        position: absolute;
        top: 65px;
        left: 122px;
    }

    .controls .play,
    .controls .pause {
        width: 60px;
        height: 60px;
        margin: 0 5px 0px 5px;
    }

    .controls .play,
    .controls .pause,
    .controls .rew,
    .controls .fwd,
    .controls .stop {
        text-indent: -10000px;
        border: none;
        float: left;
    }

    .controls .rew,
    .controls .fwd,
    .controls .stop {
        width: 50px;
        height: 50px;
        margin: 5px 5px 5px 5px;
    }

    .controls .play {
        background: url(/img/player/play.png) no-repeat;
    }

    .controls .pause {
        background: url(/img/player/pause.png) no-repeat;
        display: none;
    }

    .controls .rew {
        background: url(/img/player/rewind.png) no-repeat;
    }

    .controls .fwd {
        background: url(/img/player/next.png) no-repeat;
    }

    .controls .stop {
        background: url(/img/player/stop.png) no-repeat;
    }

    .hidden {
        display: none;
    }

    .controls .visible {
        display: block;
    }

    .volume {
        height: 11px;
        left: 230px;
        position: absolute;
        top: 142px;
        width: 140px;
    }

    .mute .volume-btn {
        background: url(/img/player/volume-off.png) no-repeat;
    }

    .volume-btn {
        background: url(/img/player/volume-up.png) no-repeat;
        height: 20px;
        width: 20px;
        float: left;
        position: relative;
        top: -4px;
    }

    .volume-adjust {
        height: 11px;
        position: relative;
        width: 80%;
        background: #fff;
        float: right;
    }

    .volume-adjust>div>div {
        height: 11px;
        background: #151b48;
    }

    .progressbar {
        background-color: #fff;
        cursor: pointer;
        z-index: 1;
        right: 6.875em;
        /* 110 */
        height: 15px;
        left: 0px;
        position: absolute;
        width: 90%;
        top: 170px;
        margin: 0px 5%;
    }

    .novolume .progressbar {
        right: 4.375em;
        /* 70 */
    }

    .progressbar div {
        width: 0%;
        height: 15px;
        position: absolute;
        left: 0;
        top: 0;
    }

    .bar-loaded {
        background-color: #f1f1f1;
        z-index: 1;
    }

    .bar-played {
        background: #151b48;
        z-index: 2;
    }

    .timeHolder {
        color: #ffffff;
        font-size: 14px;
        font-weight: bold;
        bottom: 10px;
        position: absolute;
        margin: 0px 5%;
        width: 90%;
    }

    .time-current,
    .time-duration,
    .time-separator {
        color: #ffffff;
        font-size: 14px;
        font-weight: bold;
        float: left;
    }

    .volume .ui-slider-handle {
        background: url("/img/player/spr.png") no-repeat scroll -201px -188px rgba(0, 0, 0, 0);
        height: 13px;
        width: 13px;
    }

    .playlist {
        background-color: #fff;
        list-style-type: none;
        margin: -10px 0 0 2px;
        padding-bottom: 10px;
        padding-top: 15px;
        position: relative;
        width: 95%;
        z-index: 1;
        margin: 0px auto;
    }

    .playlist li,
    .playlist div {
        color: #151b48;
        cursor: pointer;
        margin: 0 0 5px 15px;
    }

    .playlist li>a,
    .playlist div>a {
        color: #151b48;
        text-decoration: none;
    }

    .playlist li.active,
    .playlist div.active {
        font-weight: bold;
    }

    .slick-dots {
        bottom: 5px !important;
    }

    .slick-dots li button:before {
        font-size: 8px !important;
    }
</style>

<script src="/js/musicplayer.js"></script>

<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <div class="example">
                    <ul class="playlist">
                        <?php foreach($MODEL["items"] as $v): ?>
                        <li data-cover="http://digital.akauk.com/utils/musicPlayer/data/John-Wesley.jpg" data-artist="<?= $v["Autor"] ?>"><a href="/content/music/<?= $v["File"] ?>"><?= $v["Title"] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>

<script>
    $(".example").musicPlayer({
        elements: ['artwork', 'information', 'controls', 'progress', 'time', 'volume'], // ==> This will display in  the order it is inserted
        //elements: [ 'controls' , 'information', 'artwork', 'progress', 'time', 'volume' ],
        //controlElements: ['backward', 'play', 'forward', 'stop'],
        //timeElements: ['current', 'duration'],
        //timeSeparator: " : ", // ==> Only used if two elements in timeElements option
        //infoElements: [  'title', 'artist' ],

        //volume: 10,
        //autoPlay: true,
        //loop: true,

        // onPlay: function() {
        //     $('body').css('background', 'black');
        // },
        // onPause: function() {
        //     $('body').css('background', 'green');
        // },
        // onStop: function() {
        //     $('body').css('background', '#141942');
        // },
        // onFwd: function() {
        //     $('body').css('background', 'white');
        // },
        // onRew: function() {
        //     $('body').css('background', 'blue');
        // },
        // volumeChanged: function() {
        //     $('body').css('background', 'red');
        // },
        // progressChanged: function() {
        //     $('body').css('background', 'orange');
        // },
        // trackClicked: function() {
        //     $('body').css('background', 'brown');
        // },
        // onMute: function() {
        //     $('body').css('background', 'grey');
        // },
    });
</script>