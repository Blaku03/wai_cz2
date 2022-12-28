<?php
include 'includes/header.php';
include 'includes/menu.php';
?>

<div class="form-container" style="height: 50vh;">
  <form id="search-form" method="post">
    <input type="text" name="query" id="query" placeholder="Szukaj zdjec...">
    <input type="submit" class="form-button" value="Szukaj">
  </form>
</div>

<div id="results" class="chess-photo-gallery"></div>

<?php
include 'includes/footer.php';
?>

<script>
  $('#search-form').submit(function(e) {
    e.preventDefault();

    let query = $('#query').val();

    $.ajax({
      type: 'POST',
      url: 'search/title',
      data: {
        query
      },
      success: function(response) {
        let results = JSON.parse(response);
        $('#results').empty();

        $.each(results, function(index, result) {
          $('#results').append(
            `<div class="photo-container">
              <a href="static/images/${result.file_name.replace('thumbnail_', 'watermark_')}">
                <img src="static/images/${result.file_name}" />
              </a>
              <p>Autor: ${result.photo_author}</p>
              <p>Tytuł: ${result.photo_title}</p>
            </div>`
          );
        });
      }
    });
  });
</script>