<html>
<head>
<title>Library Read 2gether</title>
<link rel = "stylesheet" href = "stylesheet.css">
<!-- INTERNAL CSS -->
<style>
#tajuk
{
font-size: 25px;
font-weight: bold;
text-align: center;
}
th {
	background-color: #18508C;
	color: #fff;
}
td {
	background-color: #fff;
}
table, td,th{
	padding: 10px 30px;
	margin: auto;
	border-collapse: collapse;
	border: 2px solid black;
	text-align: center;
}
</style>
</head>
<body>
<?php
//Connect to database
include ('db_conn.php');

include ("header.html");

?>
<div id="tajuk"><p>Library Read 2gether<p>Search Book</div>
<div class="container center">
	<form action="" method="post">
		<p><center>
		<select name ="carian">
			<option>All</option>
			<option value="book_id">Book ID</option>
			<option value="book_title">Title</option>
			<option value="author">Author</option>
			<option value="isbn">ISBN</option>
			<option value="date_added">Date Added</option>
			<option value="status">Status</option>
		</select>
		<input type="text" name="i_carian">
		<input type="submit" value="Search" name="cari" class="searchbtn">
		</p></center>
	</form>
</div>

<?php
//jika user klik butang "Cari" dan textbox carian tidak empty
if (isset($_POST['cari']) && !empty($_POST['i_carian']) )
{
//kenalpasti dropdown list apa yang dipilih oleh user
switch ($_POST["carian"])
{
case "book_id": //jika user pilih search by nama
$query = "SELECT * FROM book
WHERE book_id LIKE '%$_POST[i_carian]%'";
break;
case "book_title": //jika user pilih search by nokp
$query = "SELECT * FROM book
WHERE book_title LIKE '$_POST[i_carian]'";
break;
case "author": //jika user pilih search by kelas
$query = "SELECT * FROM book
WHERE author LIKE '$_POST[i_carian]'";
break;
case "isbn": //jika user pilih search by notel
$query = "SELECT * FROM book
WHERE isbn = '$_POST[i_carian]'";
break;
case "date_added": //jika user pilih search by kodAJK
$query = "SELECT * FROM book
WHERE date_added LIKE '$_POST[i_carian]'";
break;
case "status": //jika user pilih search by kodAJK
$query = "SELECT * FROM book
WHERE status = '$_POST[i_carian]'";
break;

}
} else{
//jika user tidak buat carian, paper senarai secara default
//Papar/Select data dari DB
$query = "SELECT * FROM book";
}

$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

if (mysqli_num_rows($result) > 0) {
//table untuk paparan data
echo "<table border='1'>";
echo "<col width='100'>"; //saiz column 1
echo "<col width='210'>"; //saiz column 2
echo "<col width='170'>"; //saiz column 4
echo "<col width='180'>"; //saiz column 5
echo "<col width='210'>"; //saiz column 6
echo "<col width='150'>"; //saiz column 7
echo "<tr>";
echo "<th>Book ID</th>";
echo "<th>Title</th>";
echo "<th>Author</th>";
echo "<th>ISBN</th>";
echo "<th>Date Added</th>";
echo "<th>Status</th>";
echo "</tr>";

//papar semua data dari jadual dalam DB
while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>".$row['book_id']."</td>"; //nama atribut
	echo "<td>".$row['book_title']."</td>";
	echo "<td>".$row['author']."</td>";
	echo "<td>".$row['isbn']."</td>";
	echo "<td>".$row['date_added']."</td>";
	echo "<td>".$row['status']."</td>";
	echo "</tr>";
}
echo "</table>";
}
else { echo "<center>No Records</center>";}
?>
<?php
//include ("footer.html");
//include ("sidemenu.php");
?>

<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
</body>
</html>