<html>

<head>
    <title>Cebøng Heart Disease Predictor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 py-5">

                <h1>Cebøng</h1>
                <p class="lead">Curious that you have heart disease or not? Just check it!</p>

                <div class="predictionPopUp">
                    <div>
                        <!-- <div class="popupCloseButton">X</div> -->
                        <p id="contentPrediction">
                            <?php
                                ini_set('max_execution_time', 600);
                                $url = 'http://127.0.0.1:5000/';
                                $ch = curl_init($url);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
                                $response = curl_exec($ch);
                                curl_close($ch);

                                $response = json_decode($response);
                                echo $response;
                            ?>
                        </p>
                    </div>
                </div>

                <form id="patient-data-form" method="post" action="<?php $_PHP_SELF ?>">
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input id="age" type="text" name="age" class="form-control" placeholder="Please enter your age" required="required" data-error="Age is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sex">Sex</label>
                                    <div class="form-control border-0" data-error="Sex is required.">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="sex_male" type="radio" name="sex" value="1">
                                            <label class="form-check-label" for="sex_male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="sex_female" type="radio" name="sex" value="0">
                                            <label class="form-check-label" for="sex_female">Female</label>
                                        </div>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="chest">Chest-Pain Type</label>
                                    <select id="chest" name="chest" class="form-control" required="required" data-error="Please specify your Chest-Paint Type.">
                                        <option value=""></option>
                                        <option value="1">Typical Angina</option>
                                        <option value="2">Atypical Angina</option>
                                        <option value="3">Non-Anginal Pain</option>
                                        <option value="4">Asymptotic</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bloodPressure">Resting Blood Pressure (mmHg)</label>
                                    <input id="bloodPressure" type="text" name="bloodPressure" class="form-control" placeholder="Please enter your Resting Blood Pressure" required="required" data-error="Resting Blood Pressure is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cholestrol">Serum Cholestrol (mg/dl)</label>
                                    <input id="cholestrol" type="text" name="cholestrol" class="form-control" placeholder="Please enter your Serum Cholestrol" required="required" data-error="Serum Cholestrol is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bloodSugar">Is your Fasting Blood Sugar more than 120 mg/dl?</label>
                                    <div class="form-control border-0" data-error="Fasting Blood Sugar is required.">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="bloodSugar_true" type="radio" name="bloodSugar" value="1">
                                            <label class="form-check-label" for="bloodSugar_true">True</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="bloodSugar_false" type="radio" name="bloodSugar" value="0">
                                            <label class="form-check-label" for="bloodSugar_false">False</label>
                                        </div>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ecg">Resting ECG</label>
                                    <select id="ecg" name="ecg" class="form-control" required="required" data-error="Please specify your Resting ECG.">
                                        <option value=""></option>
                                        <option value="3">Normal</option>
                                        <option value="6">Fixed Defect</option>
                                        <option value="7">Reversable Defect</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="heartRate">Max-Heart Rate Achieved</label>
                                    <input id="heartRate" type="text" name="heartRate" class="form-control" placeholder="Please enter your Max-Heart Rate Achieved" required="required" data-error="Max-Heart Rate Achieved is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thal">Thal</label>
                                    <select id="thal" name="thal" class="form-control" required="required" data-error="Please specify your Thal.">
                                        <option value=""></option>
                                        <option value="0">Normal</option>
                                        <option value="1">Having ST-T wave abnomality</option>
                                        <option value="2">Left Ventricular Hyperthrophy</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="eia">Exercise Induced Angina</label>
                                    <div class="form-control border-0" data-error="Exercise Induced Angina is required.">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="eia_yes" type="radio" name="eia" value="1">
                                            <label class="form-check-label" for="eia_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="eia_no" type="radio" name="eia" value="0">
                                            <label class="form-check-label" for="eia_no">No</label>
                                        </div>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="peakExercise">Peak Exercise ST Segment</label>
                                    <select id="peakExercise" name="peakExercise" class="form-control" required="required" data-error="Please specify your Peak Exercise ST Segment.">
                                        <option value=""></option>
                                        <option value="1">Upsloping</option>
                                        <option value="2">Flat</option>
                                        <option value="3">Downsloping</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vessels">Number of Major Vessels Colored by Flourosopy</label>
                                    <div class="form-control border-0" data-error="Number of Major Vessels Colored by Flourosopy is required.">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="vessels_0" type="radio" name="vessels" value="0">
                                            <label class="form-check-label" for="vessels_0">0</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="vessels_1" type="radio" name="vessels" value="1">
                                            <label class="form-check-label" for="vessels_1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="vessels_2" type="radio" name="vessels" value="2">
                                            <label class="form-check-label" for="vessels_2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="vessels_3" type="radio" name="vessels" value="3">
                                            <label class="form-check-label" for="vessels_3">3</label>
                                        </div>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="stDepression">ST Depression Induced by Exercise Relative to Rest</label>
                                    <input id="stDepression" type="text" name="stDepression" class="form-control" placeholder="Please enter your ST Depression Induced by Exercise Relative to Rest" required="required" data-error="ST Depression Induced by Exercise Relative to Rest is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-predict" value="Predict">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
