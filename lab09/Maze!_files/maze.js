/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */

var loser = null;  // whether the user has hit a wall

window.onload = function() {
    var divs = $$("#maze > .boundary");
    // $$(".boundary")[0].observe("mouseover", overBoundary)
    for (var i = 0; i < divs.length; i++) {
        divs[i].observe("mouseover", overBoundary);
    }
    $("end").observe("mouseover", overEnd);
    $("start").observe("click", startClick);
    $("maze").observe("mouseout", overBody);
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
    loser = true;
    event.target.addClassName("youlose");
    $("status").innerHTML = '<div>You lose! :)</div>'
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
    loser = null;
    var divs = $$("#maze > .boundary");
    for (var i = 0; i < divs.length; i++) {
        if (divs[i].hasClassName("youlose")) {
            divs[i].removeClassName("youlose");
        }
    }
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
    if (loser === null) {
        $("status").innerHTML = '<div>You win! :)</div>'
    }
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
    var divs = $$("#maze > .boundary");
    for (var i = 0; i < divs.length; i++) {
        if (!divs[i].hasClassName("youlose")) {
            divs[i].addClassName("youlose");
        }
    }
}



