	<script src="js/jquery-1.11.1.min.js"></script>
	<script>
		$(document).ready(function(){
			var nav, content, fetchAndInsert;

			nav = $('nav#main');
			content = $('section#content');

			// Fetches and inserts content into the container
			fetchAndInsert = function(href){
				$.ajax({
					url: 'http://localhost:8080/JavaScript%20History%20API/content/' + href.split('/').pop(),
					method: 'GET',
					cache: false,
					success: function(data){
						content.html(data);
					}
				});
			};

			// User goes back/forward
			$(window).on('popstate', function(){
				fetchAndInsert(location.pathname);
			});

			
			nav.find('a').on('click', function(e){
				var href = $(this).attr('href');

				// Manipulate history
				history.pushState(null, null, href);

				// Fetch and insert content
				fetchAndInsert(href);

				e.preventDefault();
			});
		});
	</script>
	</body>
</html>