<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js  "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.0/css/dataTables.dateTime.min.css">

<table border="0" cellspacing="5" cellpadding="5">
    <tbody>
        <tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody>
</table>
<table id="example" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>CURP</th>
            <th>No. consulta</th>
            <th>No. control</th>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Hora de inicio</th>
            <th>Hora de finalización</th>
            <th>Sexo</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011-04-25</td>
            <td>$320,800</td>
            <td>$320,800</td>
            <td>$320,800</td>
            <td>$320,800</td>
            <td>$320,800</td>
        </tr>
        <tr>
            <td>alex Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011-04-25</td>
            <td>$320,800</td>
            <td>$320,800</td>
            <td>$320,800</td>
            <td>$320,800</td>
            <td>$320,800</td>
        </tr>
       
    </tfoot>
</table>


<script>
    var minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[4]);

            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        // DataTables initialisation
        var table = $('#example').DataTable();

        // Refilter the table
        $('#min, #max').on('change', function() {
            table.draw();
        });
    });
</script>