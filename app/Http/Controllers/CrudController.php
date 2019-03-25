<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clubs;
use App\Committees;
use App\Events;
use App\Majors;
use App\News;
use App\Positions;
use App\Students;
use App\Tags;
use App\Years;

class CrudController extends Controller
{
    function index(){

        $clubs_model = new Clubs;
        $committees_model = new Committees;
        $events_model = new Events;
        $majors_model = new Majors;
        $news_model = new News;
        $positions_model = new Positions;
        $students_model = new Students;
        $tags_model = new Tags;
        $years_model = new Years;

        //remove_en
        $clubs_table = substr(ucfirst($clubs_model->getTable()), 0, -3);
        $committees_table = substr(ucfirst($committees_model->getTable()), 0, -3);
        $events_table = substr(ucfirst($events_model->getTable()), 0, -3);
        $majors_table = substr(ucfirst($majors_model->getTable()), 0, -3);
        $news_table = substr(ucfirst($news_model->getTable()), 0, -3);
        $positions_table = substr(ucfirst($positions_model->getTable()), 0, -3);
        $students_table = substr(ucfirst($students_model->getTable()), 0, -3);
        $tags_table = substr(ucfirst($tags_model->getTable()), 0, -3);
        $years_table = substr(ucfirst($years_model->getTable()), 0, -3);

        $tables = [
        			$clubs_table,
        			$committees_table,
        			$events_table,
        			$majors_table,
        			$news_table,
        			$positions_table,
        			$students_table,
        			$tags_table,
        			$years_table 
        		];
       	$models = [
       				"Clubs"=>$clubs_model,
			        "Committees"=>$committees_model,
			        "Events"=>$events_model,
			        "Majors"=>$majors_model,
			        "News"=>$news_model,
			        "Positions"=>$positions_model,
			        "Students"=>$students_model,
			        "Tags"=>$tags_model,
			        "Years"=>$years_model
       			];

      	session([
                'models' => $models,
                'tables' => $tables
                ]);
        /*dd(session());*/

        return view('crud.layouts.crud',compact('tables'));

        dd($tables);
        $columns=$model->getTableColumns();
        dd($columns);
        $attributes = array_keys($data[0]->getOriginal());
        $attr_count = count($attributes);
    }

    function show($table) {

    	$models = session('models');
        $tables = session('tables');
        $model = $models[$table];
        $columns=$model->getTableColumns(); 
        $table_name_length = strlen($table);

        /*dd($table_name_length);*/

        $count = count($columns);//columns count
        $regstring_table = lcfirst($table);
        $regstring= "/".$regstring_table."/";
        
        $a_count = 0;
        $another = '';

        for ($i=0; $i< $count-2 ; $i++) {

            //cut column names into beautify (c_columns)
            if(preg_match($regstring,$columns[$i])) {

                $c_column[$i] = ucfirst(substr_replace($columns[$i], '' ,0,$table_name_length+1)); //cut columns

            } else {
                //indicates column from different table 

                $c_column[$i] = ucfirst($columns[$i]); //cut columns
                $a_columns[$i] = $columns[$i]; //another columns
               
              /*  $a_table[$i] = $c_column[$i];*/


                $a_table[$a_count] = ucfirst(substr($columns[$i], 0, strpos($columns[$i], "_"))); //another table name 

                $n_model[$a_count] = $a_table[$a_count];

                $a_model[$a_count] = $models[$n_model[$a_count]]; //another table models
                $a_data[$a_count] = $a_model[$a_count]::all(); //another table data
                
                /*if(!empty($a_data[0])) {
                    $astringm = $a_columns[$i];
                    $a_columns_name =  $a_data[0][0]->$astringm; //another table columns
                }*/

                $a_columns_positions[] = $i; //another column positions in the columns

                $a_count++;
               /* dd($a_data[0][0]->$astringm);*/
            }   

        }

      

        if(!empty($a_count)) {
            $another = [
                        'a_model' => $a_model,
                        'a_data' => $a_data,
                        'a_columns' => $a_columns,
                        'a_columns_positions' => $a_columns_positions
                    ];

        }  
            
        $data = $model::all();

        
        session([
                'columns' => $columns,
                'c_column' => $c_column,
                'count' => $count,
                'table' => $table,
                'another' => $another
                ]);

        return view('crud.section',compact('data','tables','another','columns','c_column','count','table'));
    }

    function create($table) {

        $models = session('models');
        $tables = session('tables');
        $columns = session('columns');
        $c_column = session('c_column');
        $another = session('another');
        $count = session('count');
        $table = session('table');

        switch ($table) {

            case "Clubs":
                    $committees_model =  $models['Committees'];
                    $committees_data = $committees_model::all();
                    return view('crud.create.clubs',compact('table','tables','committees_data')); 
                break;

            case "Committees":
                    return view('crud.create.committees',compact('table','tables')); 
                break;

            case "Events":
                    $tags_model =  $models['Tags'];
                    $tags_data = $tags_model::all();
                    $clubs_model = $models['Clubs'];
                    $clubs_data = $clubs_model::all();
                    return view('crud.create.events',compact ('table','tables','tags_data','clubs_data')); 
                break;

            case "Majors":
                    $years_model =  $models['Years'];
                    $years_data = $years_model::all();
                    return view('crud.create.majors',compact ('table','tables','years_data')); 
                break;

            case "News":
                    $tags_model =  $models['Tags'];
                    $tags_data = $tags_model::all();
                    $clubs_model = $models['Clubs'];
                    $clubs_data = $clubs_model::all();
                    return view('crud.create.news',compact ('table','tables','tags_data','clubs_data')); 
                break;

            case "Positions":
                    $clubs_model = $models['Clubs'];
                    $clubs_data = $clubs_model::all();
                    $committees_model =  $models['Committees'];
                    $committees_data = $committees_model::all();
                    return view('crud.create.events',compact ('table','tables','committees_data','clubs_data')); 
                break;

             case "Students":
                    $positions_model = $models['Positions'];
                    $positions_data = $positions_model::all();
                    $years_model =  $models['Years'];
                    $years_data = $years_model::all();
                    $majors_model = $models['Majors'];
                    $majors_data = $majors_model::all();
                    return view('crud.create.students',compact ('table','tables','positions_data','years_data','majors_data')); 
                break;

            case "Tags":
                    return view('crud.create.tags',compact('table','tables')); 
                break;

            case "Years":
                    return view('crud.create.years',compact('table','tables')); 
                break;
        
            default:
                # code...
                break;
        }
        return view('crud.create_crud',compact('tables','columns','another','c_column','count','table'));

    }
    function store(Request $request,$table) {

        $models = session('models');
        $tables = session('tables');
        $columns = session('columns');
        $count = session('count');
        $model = $models[$table];

    switch ($table) {

            case "Clubs":
                   $model = new Clubs;
                break;

            case "Committees":
                    $model = new Committees;
                break;

            case "Events":
                    $model = new Events;
                break;

            case "Majors":
                    $model = new Majors;
                break;

            case "News":
                    $model = new News;
                break;

            case "Positions":
                  $model = new Positions;
                break;

             case "Students":
                     $model = new Students;
                break;

            case "Tags":
                  $model = new Tags;
                break;

            case "Years":
                    $model = new Years;
                break;
        
            default:
                # code...
                break;
        }
        //dd($model);
        if (!empty($request->photo)) {
            
            for ($i=1; $i <$count-2 ; $i++) {
                $b = (string)$columns[$i];
                $model->$b = $request->$b;
                //dd($a,$b , $request->$b);
            }
    
        } else {
            for ($i=1; $i <$count-2 ; $i++) {
                $b = (string)$columns[$i];
                $model->$b = $request->$b;
                //dd($a,$b , $request->$b);
            }
        }
            $model->save();    
        
        
        return redirect('crud/'.$table.'');
    }

    function delete($table , $id) {

        $models = session('models');
        $model = $models[$table];
        $columns = session('columns');
        $count = session('count');
        $cid = $columns[0];
        
        $model = $model::where($cid,$id)->first();
        $model->delete();

        return redirect('crud/'.$table.'');
    }
}
