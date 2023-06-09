<?php
$excel = '';
if(isset($_POST['excel'])) {
    if (getCount('users') > 0) {
        $excel .= '
        <table>
        <th scope="col">User Name</th>
        <th scope="col">Total Balance</th>
        <th scope="col">Phone</th>
        <th scope="col">Main Email</th>
        <th scope="col">Emails</th>
        <th scope="col">Date Add</th>
        <th scope="col">Active</th>';
            foreach (getData('users') as $all) {
                $excel .=
                "<tr>
                    <td>" . $all['username'] . "</td>
                    <td>" . getCount('url_transactions','ut_state=1 and username=?',array($all['username'])) . "</td>";
                    $excel .="<td>" . $all['phone'] . "</td>
                    <td>" . $all['main_email'] . "</td>
                    <td>" . $all['email'] . "</td>
                    <td>" . $all['us_date'] . "</td>
                    <td>" . printName($all['active']) . "</td>
                </tr>";
            }
        $excel .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=1.xls');
        echo $excel;
        // header('location: ?Page=View');
    }
}