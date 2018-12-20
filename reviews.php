
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ReviewsPanda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="reviews.css">
    <link href="https://fonts.googleapis.com/css?family=Antic|Jura|Khand|Rajdhani" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
  </head>
  <body>


    <div class=" container-fluid wrapper">

      <section class="section sticky section--s1">
        <h1>Markup</h1>
        <p>The page is laid out using <span class="pre">&#60;header&#62;</span>, <span class="pre">&#60;section&#62;</span>, and <span class="pre">&#60;footer&#62;</span> tags. Any section that will stick to the top of the page, like this one, has a <span class="pre">.sticky</span> class.</p>
      </section>
      <section class="section sticky section--s2">
        <h1>Styling</h1>
        <p>Each <span class="pre">.sticky</span> section of the page is styled to cover the full screen height using <span class="pre">max-height:100vh; min-height: 100vh; height: 100vh;</span>. It is important that the section is no taller otherwise the contents will be hidden 'below the fold'.</p>
        <p>The section sticks using <span class="pre">position:-webkit-sticky; position: sticky; top: -1px;</span> where <span class="pre">top</span> sets the point at which the section sticks.</p>
      </section>
    </div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>

</html>