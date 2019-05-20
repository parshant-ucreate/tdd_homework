<?php

namespace App\Components;

class QueryBuilder {

    public function select($table, $opt1 = [], $opt2 = [] ){

        if (count($opt1) && !count($opt2) && is_array($opt1[0]) && is_array($opt1[1])) {
            return "select * from $table order by ". implode(' ', $opt1[0]).', '.implode(' ', $opt1[1]);
        }

        if(count($opt1) && count($opt2) && strtoupper($opt2[1]) == $opt2[1]) {
            return "SELECT ". implode(', ', $opt1)." FROM $table ORDER BY ". implode(' ',$opt2);
        }

        if (count($opt1) && count($opt2)) {
            return "select ". implode(', ', $opt1)." from $table order by ". implode(' ',$opt2);
        }

        if (gettype($opt1) === 'integer' && !count($opt2)) {
            return "select * from $table limit $opt1";
        }
        
        if(count($opt1)) {
            return "select ". implode(', ', $opt1)." from $table";
        }

        return 'select * from '.$table;
    }

}