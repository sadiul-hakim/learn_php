<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Data</title>
    <style>
        table,
        tr,
        th,
        td {
            border: 1px solid #333;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php
    $usersArr = [
        [1, "Hakim", "Backend Developer"],
        [2, "Jisan Mia", "Frontend Developer"]
    ];
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // foreach ($usersArr as $u) {
            //     echo "<tr>
            //         <td>{$u[0]}</td>
            //         <td>{$u[1]}</td>
            //         <td>{$u[2]}</td>
            //       </tr>";
            // }
            foreach ($usersArr as $u) {
                echo "<tr>";
                foreach ($u as $d) {
                    echo "<td>";
                    echo $d;
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>