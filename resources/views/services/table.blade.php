<<<<<<< HEAD
<?php

declare(strict_types=1);

?>
=======
>>>>>>> c4ec0fb6 (.)
<table border="1" class="table table-bordered">
@foreach ($rows as $row)
    <tr>
        @foreach ($row as $cell)
            <td>{{ is_string($cell)?$cell:'--NOT STRING--' }}</td>
        @endforeach
    </td>
@endforeach
<<<<<<< HEAD
</table>
=======
</table>
>>>>>>> c4ec0fb6 (.)
