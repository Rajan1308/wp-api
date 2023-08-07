const loadPostByRestButton = document.getElementById('wp-learn-rest-api-button');

if(loadPostByRestButton) {
   loadPostByRestButton.addEventListener('click', function() {
    // alert(1);
    const allPosts = new wp.api.collections.Posts();
    // console.log(allPosts);
    allPosts.fetch().done(
      function (posts) {
        const textarea = document.getElementById('wp-learn-posts');
        posts.forEach (function(post){
          textarea.value += post.title.rendered + '\n';
        });
      }
    );
   });
}



/**
 * Clear the text area button
 */

const clearPostButton = document.getElementById('wp-learn-clear-posts');

if(clearPostButton){
   clearPostButton.addEventListener('click', function () {  
     const textarea = document.getElementById('wp-learn-posts');
     textarea.value = '';
   });
}