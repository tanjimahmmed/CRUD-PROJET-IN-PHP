<?php

define('DB_NAME', '/Users/mdtanjimahmmed/Documents/php/crud/data/db.txt');

function seed(){
    $data = array(
        array (
            'id' => 1,
            'fname' => 'Arya',
            'lname' => 'Ar',
            'roll' => '12',
        ),
        array (
            'id' => 2,
            'fname' => 'Aidan',
            'lname' => 'Ad',
            'roll' => '8',
        ),
        array (
            'id' => 3,
            'fname' => 'Javier',
            'lname' => 'JR',
            'roll' => '2',
        ),
        array (
            'id' => 4,
            'fname' => 'Antonia',
            'lname' => 'AN',
            'roll' => '7',
        ),
    );
    $serializedData = serialize($data);
    // To add this data into your data file
    file_put_contents(DB_NAME, $serializedData, LOCK_EX);
}

function generateReport(){
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Roll</th>
                <th width="25%">Action</th>
            </tr>
            <?php
                foreach($students as $student){
                    ?>
                        <tr>
                            <td><?php printf('%s %s', $student['fname'], $student['lname']); ?></td>
                            <td><?php printf('%s', $student['roll']); ?></td>
                            <td><?php printf('<a href="/crud/index.php?task=edit&id=%s">Edit</a> | <a href="/crud/index.php?task=delete&id=%s">Delete</a>', $student['id'],$student['id']); ?></td>
                        </tr>
                    <?php
                }
            ?>
        </table>
    <?php
}

