// CSE 190M, Spring 2009
// Section 8: Photo Gallery
// Sylvia Tashev

document.observe("dom:loaded", function() {
    // set up basic event handlers





    var pictures = $$("#pictures img");
    for (var i = 0; i < pictures.length; i++) {
        pictures[i].observe("click", pictureClick);
    }

    // set up initial pic and effects
    setCurrentPic(pictures[0]);

    // allows the user to rearrange the picture order
    Sortable.create("pictures", {
        tag: "img",
        constraint: "horizontal"
    });

    // make all the thumbnails drag-and-droppable
    for (var i = 0; i < pictures.length; i++) {
        new Draggable(pictures[i], {revert: true});
    }
    Droppables.add("mainimage", {onDrop: setCurrentPic});



});

// sets the current large picture to be the one from the given thumbnail
function setCurrentPic(pic) {
    var oldCurrentPic = $$(".currentpic")[0];
    if (oldCurrentPic != pic) {
        // emphasize new current pic
        pic.addClassName("currentpic");
        new Effect.Scale(pic, 200);

        $("mainimage").src = pic.src.replace("_thumb", "");

        if (oldCurrentPic) {
            // de-emphasize old current pic
            oldCurrentPic.removeClassName("currentpic");
            new Effect.Scale(oldCurrentPic, 50);
        }
    }
}

// called when any picture is clicked  (or dragged into the main show area)
function pictureClick() {
    setCurrentPic(this);
}

// called when Left arrow is clicked
function goLeft() {
    var current = $$(".currentpic")[0];
    var previous = current.previous();
    if (previous) {
        setCurrentPic(previous);
    }
}

// called when Right arrow is clicked
function goRight() {
    var current = $$(".currentpic")[0];
    var next = current.next();
    if (next) {
        setCurrentPic(next);
    }
}
