<script type="text/javascript" src="jquery.js"></script>
<table><form name="form1" id="form1" method="post" action="results.php">
    <tr>
        <td> </td><td> a </td><td> b </td>
    </tr>
    <tr>
        <td> Line 1 </td><td><input name="a1" id="a1" type="number"></td><td><input name="b1" id="b1" type="number"></td>
    </tr>
    <tr>
        <td> Line 2 </td><td><input name="a2" id="a2" type="number"></td><td><input name="b2" id="b2" type="number"></td>
    </tr>
    <tr>
        <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
</form></table>

<table>
    <tr>
        <td> Dynamic Result </td>
    </tr>
    <tr>
        <td id="first-result"> a1/b1 (to be calculated dynamically)</td>
    </tr>
    <tr>
        <td id="second-result"> a2/b2 (to be calculated dynamically) </td>
    </tr>
</table>


<script>
$(document).ready(function(){
    $('input').on('change', function(){
        var a1 = $('#a1').val();
        var a2 = $('#a2').val();
        var b1 = $('#b1').val();
        var b2 = $('#b2').val();
        $('#first-result').text(parseInt(a1)/parseInt(a2));
        $('#second-result').text(parseInt(a2)/parseInt(b2));
    }); 
});
</script>