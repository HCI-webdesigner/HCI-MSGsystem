/* Javascript Document */
window.onload = function() {
    resize();
};

function resize() {
    var board = document.getElementById('board');
    var frame = document.getElementById('framepage');
    board.style.height = window.screen.availHeight + document.body.scrollTop + 'px';
    frame.style.height = window.screen.availHeight + document.body.scrollTop + 'px';
}
