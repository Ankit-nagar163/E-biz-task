<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>My Numbers</title>
</head>
<body>
    <div class="container">
        <h3>My Form</h3>
        <form id="myfrom"> 
            @csrf    
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Generate numbers (Default: 67890000):</label>
               <input class="form-control" type="text" name="number" value="67890000" readonly><br>          
             
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Generate Number</label>
              <input type="number" name="quantity" class="form-control" id="exampleInputPassword1">
            </div>
            
            <button type="submit" class="btn btn-primary">Generate Number</button>
          </form>
          <div id="results"></div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {        
        $('#myfrom').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: '/generatenumber',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    alert(response.message);
                    console.log(response.message);
                    loadResults();
                }
            });
        });      
        function loadResults() {
            $.ajax({
                url: '/showdata',
                method: 'GET',
                success: function (data) {
                    let html = '<table border="1"><tr><th>Number</th><th>Status</th></tr>';
                    data.forEach(function (item) {
                        html += `<tr><td>${item.number}</td><td>${item.verified}</td></tr>`;
                    });
                    html += '</table>';
                    $('#results').html(html);
                }
            });
        }
        loadResults();
    });
</script>
