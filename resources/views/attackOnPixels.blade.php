<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Attack On Pixels | 2nd Recrutment ">
    <link rel="icon" href="{{ asset('images/attack/logo_b_r.png') }}" style="width=200px;"   >


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha3/css/bootstrap.min.css" integrity="sha512-fjZwDJx4Wj5hoFYRWNETDlD7zty6PA+dUfdRYxe463OBATFHyx7jYs2mUK9BZ2WfHQAoOvKl6oYPCZHd1+t7Qw==" crossorigin="anonymous" />
    <title>Attack On Pixels | Pixels Egypt</title>

    <style>
        body {
            font-family: 'New Tegomin', serif;
        }

        a {
            text-decoration: unset;        
        }

        .imgBox {
            animation: upDown 5s linear infinite
        }

        @keyframes upDown {
            0%,100%
            {
                transform: translateY(50px)
            }
            50%
            {
                transform: translateY(10px)
            }
        }
    </style>
</head>
<body>
    @php
        $committees = [
            'Academic: Instructors',
            'Academic: Juniors',
            'Projects and Contests',
            'Geeky Media',
            'Information Technology (IT)',
            'Media and Marketing: Media',
            'Media and Marketing: Marketing',
            'Human Resources (HR)',
            'External Relations: Public Relations (PR)',
            'External Relations: Fundraising (FR)',
            'Logistics and Event Planning',
        ];
    @endphp

    <div class="container mt-lg-4 mb-lg-5 h-100">
        <div class="row bg-dark">
            <div class="col-lg-6 mb-2">
                <div class="row bg-secondary p-1">
                    <div class="col-3">
                        <img class="img-fluid" width="60" src="{{ asset('images/attack/Attack2.png') }}"alt="">
                    </div>
                    <div class="col-9 align-self-center">
                        <img class="img-fluid" src="{{ asset('images/attack/Attack0.png') }}" alt="">
                    </div>
                </div>
                <div class="imgBox">
                    <img class="img-fluid " src="{{ asset('images/attack/Attack1.png') }}" alt="">
                </div>
                <div class="imgBox text-center">
                    <img class="img-fluid " width="150" src="{{ asset('images/attack/sloganPixels.png') }}" alt="">
                </div>

                <div class="text-center mt-3">
                    <img class="img-fluid" src="{{ asset('images/attack/Attack0.png') }}" alt="">
                </div>
                
            </div>
            <div class="col-lg-6 p-2">
                <form class="border px-2 py-3 rounded" method="POST" action="{{ route('attack') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror " id="floatingInput" placeholder="EX:Pixels" value="{{ old('name') }}"  name="name">
                        <label for="floatingInput">Name</label>
                        @error('name')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        
                    </div>
                   
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="Pixels21@gmail.com" value="{{ old('email') }}" name="email">
                        <label for="floatingInput">E-Mail </label>
                        @error('email')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" placeholder="EX:011*****56" value="{{ old('phone') }}" name="phone">
                        <label for="floatingInput">Phone number</label>
                        @error('phone')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('univ') is-invalid @enderror" id="floatingInput" placeholder="Helwan University" value="{{ old('univ') }}" name="univ">
                        <label for="floatingInput">University or School</label>
                        @error('univ')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('dep') is-invalid @enderror" id="floatingInput" placeholder="Communication" value="{{ old('dep') }}" name="dep">
                        <label for="floatingInput">Department</label>
                        @error('dep')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('acYear') is-invalid @enderror" id="floatingInput" placeholder="Communication" value="{{ old('acYear') }}" name="acYear">
                        <label for="floatingInput">Academic Year</label>
                        @error('acYear')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('preVolu') is-invalid @enderror" id="floatingInput" placeholder="EX:Pixels Student Activity" value="{{ old('preVolu') }}" name="preVolu">
                        <label for="floatingInput">Previous Volunteering Activities</label>
                        @error('preVolu')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control mb-3 @error('aboutPixels') is-invalid @enderror" placeholder="What do you know about Pixels ?" id="floatingTextarea2" style="height: 150px" value="{{ old('aboutPixels') }}" name="aboutPixels"></textarea>
                        <label for="floatingTextarea2">What do you know about Pixels ?</label>
                        @error('aboutPixels')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">1st Committee</label>
                        <select class="form-select @error('committee') is-invalid @enderror" id="selectCommitee" value="{{ old('committee') }}" name="committee">
                          <option selected disabled>Choose...</option>
                          @foreach ($committees as $committee)
                            <option value="{{ $committee }}">{{ $committee }}</option>
                          @endforeach
                        </select>
                        @error('committee')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control mb-3 @error('aboutCommitte') is-invalid @enderror" placeholder="Pixels" id="aboutCommitte" style="height: 150px" value="{{ old('aboutCommitte') }}" name="aboutCommitte"></textarea>
                        <label for="aboutCommitte">Why do you want to join this committee ?</label>
                        @error('aboutCommitte')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control mb-3 @error('quesOne') is-invalid @enderror"  id="fristQues " placeholder="Pixels" style="height: 150px" value="{{ old('quesOne') }}" name="quesOne"></textarea>
                        <label for="fristQues" id="quesOne">Select committee frist!</label>
                        @error('quesOne')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control mb-3 @error('quesTwo') is-invalid @enderror"  id="secQues" placeholder="Pixels" style="height: 150px" value="{{ old('quesTwo') }}" name="quesTwo"></textarea>
                        <label for="secQues" id="quesTwo">Select committee frist!</label>
                        @error('quesTwo')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">2nd Committee</label>
                        <select class="form-select @error('secCommitte') is-invalid @enderror" id="inputGroupSelect01" value="{{ old('secCommitte') }}" name="secCommitte">
                          <option selected disabled>Choose...</option>
                          @foreach ($committees as $committee)
                            <option value="{{ $committee }}">{{ $committee }}</option>
                          @endforeach
                        </select>
                        @error('secCommitte')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input class="btn btn-primary rounded-pill w-100 my-3" type="submit" value="Submit">
                </form>
            </div>
            
        </div>
    </div>

    <footer class="bg-dark py-2">
        <p class="text-center m-0 text-muted">Pixels © All Right Reseved-2021 By pixelseg.com </p>
    </footer>

    
        <script>
            let selectElement = document.querySelector('#selectCommitee');
            let quesOne = document.querySelector('#quesOne');
            let quesTwo = document.querySelector('#quesTwo');

            selectElement.onchange = () => {
                var selectedValue = selectElement.value;

                switch (selectedValue) {
                    case "Academic: Instructors":
                        quesOne.innerHTML = "Do you have any technical knowledge or skills?";
                        quesTwo.innerHTML = "Are you good with self-studying technique?";
                        break;

                    case "Academic: Juniors":
                        quesOne.innerHTML = "What courses do you want to get ? ";
                        quesTwo.innerHTML = "What courses have you got ?";
                        break;

                    case "Projects and Contests":
                        quesOne.innerHTML = "Do you have any previous experience in this field? If yes, mention it.";
                        quesTwo.innerHTML = "what are your technical skills?";
                        break;

                    case "Geeky Media":
                        quesOne.innerHTML = "Do you have the creativity in video editing ?";
                        quesTwo.innerHTML = "Have you got an interesting way of creating scripts ?";
                        break;

                    case "Information Technology (IT)":
                        quesOne.innerHTML = "What do you know about 'IT Committee' ?";
                        quesTwo.innerHTML = "Do you have any previous experience in web? If yes, mention it.";
                        break;

                    case "Media and Marketing: Media":
                        quesOne.innerHTML = "What do you know from graphic design programs ?! And what is the extent of that knowledge ?";
                        quesTwo.innerHTML = "What do you know about the basics of graphic design ?!";
                        break;

                    case "Media and Marketing: Marketing":
                        quesOne.innerHTML = "What do you know from graphic design programs ?! And what is the extent of that knowledge ?";
                        quesTwo.innerHTML = "What do you know about the basics of graphic design ?!";
                        break;

                    case "Human Resources (HR)":
                    quesOne.innerHTML = "Do you have any experience with any other student activity ? mention it ?";
                        quesTwo.innerHTML = "Why did you choose to be (HR)?";
                        break;

                    case "External Relations: Public Relations (PR)":
                        quesOne.innerHTML = "Mention some of your skills ?";
                        quesTwo.innerHTML = "Why did you choose to be (PR) ?";
                        break;

                    case "External Relations: Fundraising (FR)":
                        quesOne.innerHTML = "Do you have any experience with any other student activity?  mention it ?";
                        quesTwo.innerHTML = "Why did you choose to be (FR) ?";
                        break;

                    case "Logistics and Event Planning":
                        quesOne.innerHTML = "Do you have any previous experience in Logistics and Event Planning committee or related to it? If yes, mention it";
                        quesTwo.innerHTML = "What skills do you have that would benefit our committee ?";
                        break;
                
                    default:
                        quesOne.innerHTML = "Select committee frist!";
                        quesTwo.innerHTML = "Select committee frist!";
                        break;
                }
            }
            

            

        </script>


    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha3/js/bootstrap.min.js" integrity="sha512-Qpek3fOFi+uCW8qSf92lltHNMRMHmLISYDIRFI4qgNV2U28+4Zc3EZC8szMMeVI9KA3zEZFtIP8gt41Pekd29w==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>
</html>