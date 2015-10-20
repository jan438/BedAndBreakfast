var $id3 = function(e){return document.getElementById(e);};

function loadUrl(url, callback, reader) {
    var startDate = new Date().getTime();
    ID3.loadTags(url, function() {
        var endDate = new Date().getTime();
        if (typeof console !== "undefined") console.log("Time: " + ((endDate-startDate)/1000)+"s");
        var tags = ID3.getAllTags(url);
        
        $id3("artist").textContent = tags.artist || "";
        $id3("title").textContent = tags.title || "";
        $id3("album").textContent = tags.album || "";
        $id3("artist").textContent = tags.artist || "";
        $id3("year").textContent = tags.year || "";
        $id3("comment").textContent = (tags.comment||{}).text || "";
        $id3("genre").textContent = tags.genre || "";
        $id3("track").textContent = tags.track || "";
        $id3("lyrics").textContent = (tags.lyrics||{}).lyrics || "";
        if( "picture" in tags ) {
            var image = tags.picture;
            var base64String = "";
            for (var i = 0; i < image.data.length; i++) {
                base64String += String.fromCharCode(image.data[i]);
            }
	    $id3("art").src = "data:" + image.format + ";base64," + window.btoa(base64String);
	    $id3("art").style.display = "block";
	} else {
	    $id3("art").style.display = "none";
	}
	if( callback ) { callback(); };
    },
    {tags: ["artist", "title", "album", "year", "comment", "track", "genre", "lyrics", "picture"],
     dataReader: reader});
}

function loadFromLink(link) {
    var loading = link.parentNode.getElementsByTagName("img")[0];
    var url = link.href;

    loading.style.display = "inline";
    loadUrl(url, function() {
        loading.style.display = "none";
    });
}

function load(elem) {
	loadFromLink(elem);
}

