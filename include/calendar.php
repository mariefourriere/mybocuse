<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

</head>
<body>

    <!------------- Marie recipe page start------------->
<main>


</main>



    <!------------- Marie recipe page start------------->


    <!------------- Marie modale recipe start------------->
    <div class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Book your recipe</p>
            <button class="delete" aria-label="close"></button>
          </header>
          <section class="modal-card-body">
            <form action="GET">
                <label for="Title">Recipe Title</label>
                <input type="text" name="recipe_title">
            </form>
          </section>
          <footer class="modal-card-foot">
            <button class="button is-success">Save changes</button>
            <button class="button">Cancel</button>
          </footer>
        </div>
      </div>

      <!------------- Marie modale recipe end------------->

</body>
</html>