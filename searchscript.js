	$(document).ready(function() {
$('#keyword').on('input', function() {
	var searchKeyword = $(this).val();
	$.post('search.php', { keywords: searchKeyword }, function(data) {
		$('ul#content').empty()
		$.each(data, function() {
			$('ul#content').append('<li><a href="profile.php?id=' + this.id + '">' + this.title + '</a></li>');
							});
		}, "json");

	});
});