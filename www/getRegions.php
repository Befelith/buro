<?php
					
                    if(file_exists("ua-cities.xml"))
                    {
                        $xml = simplexml_load_file("ua-cities.xml");
						
						echo '<option value="Выбрать">'."Выбрать".'</option>';
                        foreach($xml->region as $region)
                        {
                            //echo "\t" .$region["name"]."<br>";
                            echo '<option value="'.$region["name"].'">'.$region["name"].'</option>';
                           
                        }   
                    }
                    
                    ?>