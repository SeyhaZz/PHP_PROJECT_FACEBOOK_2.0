function increaseLike(number) {
    currentLike = document.querySelectorAll(".numberOfLikes")[number].textContent;
    document.querySelectorAll(".numberOfLikes")[number].textContent = parseInt(currentLike) + 1;
    document.querySelectorAll(".like-icon")[number].style.color = "blue";
}

//  SEARCH POST
var search = document.querySelector('#search-post');
search.addEventListener('keyup', function(e) {
    let text = search.value.toLowerCase();
    const itemPosts = document.querySelectorAll('#controll-post');
    for (let post of itemPosts) {
        let title = post.children[1].firstElementChild.textContent.toLocaleLowerCase();
        if (title.indexOf(text) === -1) {
            post.style.display = "none";
        } else {
            post.style.display = "block";
        }
    }
})