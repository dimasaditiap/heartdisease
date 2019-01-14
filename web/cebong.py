from flask import Flask, render_template, request
import pickle
import json
import re

app = Flask(__name__)


@app.route("/")
def index():
    return render_template('index.php')


@app.route('/', methods=['POST'])
def main():
    """
    main program
    """
    body = dict(request.form)
    
    data = requestToData(body)
    data = toInstance(data)
    
    # load the model from disk
    filename = './model.sav'
    model = pickle.load(open(filename, 'rb'))
    heart_disease = model.predict([data])[0]

    with open('heartDisease.json', 'w') as f:
        json.dump(heart_disease, f)

    return json.dumps(heart_disease)


def requestToData(body):
    data = []
    keys = ['age', 'sex', 'bloodPressure', 'cholestrol', 'bloodSugar',  'heartRate', 'eia', 'stDepression', 'chest', 'ecg', 'peakExercise']
    median = {
        'age': 54.0, 'sex': 1.0, 'chest': 4.0, 'bloodPressure': 130.0,
        'cholestrol': 225.0, 'bloodSugar': 0.0, 'ecg': 0.0, 'heartRate': 140.0,
        'eia': 0.0, 'stDepression': 1.0, 'peakExercise': 2.0
    }

    for key in sorted(body):
        if(key != 'vessels' and key != 'thal'):
            if(body[key][0]):
                data.append(float(body[key][0]))
            else:
                data.append(median[key])

    return data

# dat = [55.0, 1.0, 158.0, 217.0 , 0.0, 110.0, 1.0, 2.5, 0.0, 0.0, 0.0, 1.0, 1.0, 0.0, 0.0, 0.0, 1.0, 0.0]


def toInstance(data):
    ret = []
    for idx, val in enumerate(data):
        if (idx == 8):
            for j in range(4):
                ret.append(1 if j == val-1 else 0)
        elif (idx == 9):
            for j in range(3):
                ret.append(1 if j == val else 0)
        elif (idx == 10):
            for j in range(3):
                ret.append(1 if j == val-1 else 0)
        else:
            ret.append(val)
    
    return ret


if __name__ == '__main__':
    app.run(debug=True)
