let tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
let firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
let player;


$(".youtubeVideoLoader").each(function() {
    $(this).css('background-image', 'url(//img.youtube.com/vi/' + this.id + '/sddefault.jpg)');

    $(document).delegate('#' + this.id, 'click', function() {

        player = new YT.Player('videoModalContainer', {
            videoId: this.id,
            width: '640',
            height: '390',
            host: 'https://www.youtube.com',
            events: {
                'onReady': OpenModal,
            }
        });

        function OpenModal() {
            $("#youtubeModal").modal({backdrop: "static"});
            player.setPlaybackQuality('highres');
            player.playVideo();
        }
    });

});

$('#CloseModalButton').click(function(){
    player.destroy();
});
