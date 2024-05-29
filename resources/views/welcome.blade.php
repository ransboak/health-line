<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/style.css')}}">
    <title>Document</title>
    
</head>
<body>
    <div class="container">
        <nav>
            <div class="profile">
                <div class="profile-img">
                    <img src="{{asset('assets/TestLogo.svg')}}"alt="" />
                </div>
                <div class="profile-details">
                    <p class="profile-name"></p>
                    <small class="role" ></small>
                </div>
            </div>
    
            <ul class="buttons">
    
                <li>
                    <a href=""><img src="{{asset('assets/home_FILL0.svg')}}" alt=""> Notifications</a>
                </li>
                <li >
                    <a href="" class="active"><img src="{{asset('assets/group_FILL0.svg')}}" alt=""> Patients</a>
                </li>
                <li>
                    <a href=""><img src="{{asset('assets/BirthIcon.png')}}" alt=""> Schedule</a>
                </li>
                <li >
                    <a href=""><img src="{{asset('assets/chat_bubble.svg')}}" alt=""> Message</a>
                </li>
                <li>
                    <a href=""><img src="{{asset('assets/credit_card.svg')}}" alt=""> Transactions</a>
                </li>
            </ul>
    
            <div class="user-profile">
                <div class="profile-img">
                    <img src="{{asset('assets/doctor.png')}}"alt="" />
                </div>
                <div class="profile-details" style="">
                    <p class="profile-name">Dr. Jose Simmons</p>
                    <small class="role" >General Practitioner</small>
                </div>
                <div class="side">
                    <img src="{{asset('assets/settings.png')}}" alt="">
                    <img src="{{asset('assets/more.png')}}" alt="">
                </div>
            </div>
        </nav>
    
        <div class="box">
            <div class="side-nav" style="padding: 1.5rem">
                <div>
                    <h2>Patients</h2>
                    <img src="{{asset('assets/search_FILL0.png')}}" alt="">
                </div>

                <ul class="patients">
                    @foreach ($patients as $patient)
                    <li class="patient">
                        <img src="{{$patient['profile_picture']}}" alt="">
                        <span class="patient-detail-" style="display: flex; flex-direction:column">
                            <p class="patient-name">{{$patient['name']}}</p>
                            <p class="patient-other">{{$patient['gender']}}, {{$patient['age']}}</p>
                        </span>
                        <img class="more-hor" src="{{asset('assets/more.png')}}" alt="">
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="box-container">
                <div class="top">
                    <div class="first">
                        <h1>Diagnosis</h1>
                        <div class="chart-details">
                        <div id="chart">
                        </div>
                        <div class="health">
                            <div class="health-details">
                                <div class="sub-health-details">
                                    <div ></div>
                                    <div class="health-details__heading">
                                        Systolic
                                    </div>
                                </div>
                                <h3>{{$latestSystolic['value']}}</h3>
                                <div class="sub-health-details">
                                    <img src="{{asset('assets/ArrowUp.svg')}}" alt="">
                                    <div class="health-details__heading">
                                        {{$latestSystolic['levels']}}
                                    </div>
                                </div>
                                
                            </div>
                            <div class="health-details">
                                <div class="sub-health-details">
                                    <div ></div>
                                    <div class="health-details__heading">
                                        Diastolic
                                    </div>
                                </div>
                                <h3>{{$latestDiastolic['value']}}</h3>
                                <div class="sub-health-details">
                                    <img src="{{asset('assets/ArrowDown.svg')}}" alt="">
                                    <div class="health-details__heading">
                                        {{$latestDiastolic['levels']}}
                                    </div>
                                </div>
                                
                            </div>
                            {{-- <br style="background: black" /> --}}
                        </div>
                        </div>
                    </div>
                    <div class="vitals">
                        <article class="vitals-box">
                            <div class="vital-img">
                                <img src="{{asset('assets/respiratory rate.svg')}}" alt="" />
                            </div>
                            <div class="vital-box-text" style="margin-bottom: 1rem">
                                <p>Respiratory Rate</p>
                                <h3>{{$user_respiratory['value']}} bpm</h3>
                            </div>
                            <small style="display: flex; align-items:center; gap: 0.3rem; font-size:14px">{{$user_respiratory['levels']}}</small>
                        </article>
                        <article class="vitals-box">
                            <div class="vital-img">
                                <img src="{{asset('assets/temperature.svg')}}" alt="" />
                            </div>
                            <div class="vital-box-text" style="margin-bottom: 1rem">
                                <p>Temperature</p>
                                <h3>{{$user_temperature['value']}} F</h3>
                            </div>
                            <small style="display: flex; align-items:center; gap: 0.3rem; font-size:14px">{{$user_temperature['levels']}}</small>
                        </article>
                        <article class="vitals-box">
                            <div class="vital-img">
                                <img src="{{asset('assets/HeartBPM.svg')}}" alt="" />
                            </div>
                            <div class="vital-box-text" >
                                <p>Heart Rate</p>
                                <h3>{{$user_heart['value']}} bpm</h3>
                            </div>
                            <small style="display: flex; align-items:center; gap: 0.3rem; font-size:14px">{{$user_heart['levels']}}</small>
                        </article>
                    </div>
                </div>

                <div class="first" style="height: 349px">
                    <h1>Diagnostics list</h1>
                    <div class="table-">
                    
                        <table>
                            <thead>
                              <tr>
                                <th>Problem/Diagnosis</th>
                                <th>Description</th>
                                <th>Status</th>
                                
                              </tr>
                            <thead>
                            <tbody>
                                @foreach ($diagnosticList as $diagnosis)
                                <tr>
                                    <td>{{$diagnosis['name']}}</td>
                                    <td>{{$diagnosis['description']}}</td>
                                    <td>{{$diagnosis['status']}}</td>
                                  </tr>
                                @endforeach
                              
                            </tbody>
                        </table>
                    </div>
                </div>
                
                
            </div>
            <div class="right-side-bar">
                <div class="patient-profile">
                    <article class="user-box">
                        <div class="user-img">
                            <img src="{{$user['profile_picture']}}" alt="" />
                        </div>
                        <h3>{{$user['name']}}</h3>
                        
                    </article>
    
                    <ul class="patient-details">
                        <li class="patient-detail">
                            {{-- <span patient><img src="{{asset('assets/chat_bubble.svg')}}" alt=""> Message</span> --}}
                            <div class="detail-img">
                                <img src="{{asset('assets/BirthIcon.png')}}"alt="" />
                            </div>
                            <div class="detail-text" style="">
                                <p class="detail-title">Date of birth</p>
                                <small class="detail-real" > {{\Carbon\Carbon::parse($user['date_of_birth'])->format('M d, Y')}}</small>
                            </div>
                        </li>
                        <li class="patient-detail">
                            {{-- <span patient><img src="{{asset('assets/chat_bubble.svg')}}" alt=""> Message</span> --}}
                            <div class="detail-img">
                                <img src="{{asset('assets/FemaleIcon.png')}}"alt="" />
                            </div>
                            <div class="detail-text" style="">
                                <p class="detail-title">Gender</p>
                                <small class="detail-real">{{$user['gender']}}</small>
                            </div>
                        </li>
                        <li class="patient-detail">
                            {{-- <span patient><img src="{{asset('assets/chat_bubble.svg')}}" alt=""> Message</span> --}}
                            <div class="detail-img">
                                <img src="{{asset('assets/PhoneIcon.png')}}"alt="" />
                            </div>
                            <div lass="detail-text" style="">
                                <p class="detail-title">Contact Info.</p>
                                <small class="detail-real" >{{$user['phone_number']}}</small>
                            </div>
                        </li>
                        <li class="patient-detail">
                            {{-- <span patient><img src="{{asset('assets/chat_bubble.svg')}}" alt=""> Message</span> --}}
                            <div class="detail-img">
                                <img src="{{asset('assets/PhoneIcon.png')}}"alt="" />
                            </div>
                            <div lass="detail-text" style="">
                                <p class="detail-title">Emergency Contact</p>
                                <small class="detail-real" >{{$user['emergency_contact']}}</small>
                            </div>
                        </li>
                        <li class="patient-detail">
                            {{-- <span patient><img src="{{asset('assets/chat_bubble.svg')}}" alt=""> Message</span> --}}
                            <div class="detail-img">
                                <img src="{{asset('assets/InsuranceIcon.png')}}"alt="" />
                            </div>
                            <div lass="detail-text" style="">
                                <p class="detail-title">Insurance Provider</p>
                                <small class="detail-real" >{{$user['insurance_type']}}</small>
                            </div>
                        </li>
                        
                       
                    </ul>

                    <div class="show-info-button">
                        <button class="show-info">Show All Information</button>
                    </div>
                </div>

                <div class="lab-results">
                    <h1>Lab Results</h1>

                    <ul class="results-list">
                        @foreach ($resultsList as $result)
                        <li class="result">
                            <p>{{$result}}</p>
                            <img src="{{asset('assets/download.svg')}}" alt="">
                        </li>
                        @endforeach
                        
                        
                    </ul>

                </div>

                

            </div>
            
        </div>
    </div>
    
</body>
<!-- apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<script>
    var data = @json($formattedData);
    var dates = data.labels;
    dates.sort((a, b) => new Date(a) - new Date(b));
    var options = {
  chart: {
    height: 350,
    type: "line",
    stacked: false
  },
  dataLabels: {
    enabled: false
  },
  colors: ["#E66FD2", "#8C6FE6"],
  series: [
    {
      name: "Systolic",
      data: data.systolic,
    },
    {
      name: "Diastolic",
      data: data.diastolic,
    }
  ],
  stroke: {
    width: [4, 4],
    curve: 'smooth',
  },
  plotOptions: {
    bar: {
      columnWidth: "20%"
    }
  },
  xaxis: {
    categories: data.labels,
  },
  yaxis: [
    {
      axisTicks: {
        show: true
      },
      axisBorder: {
        show: true,
        color: "#E66FD2"
      },
      labels: {
        style: {
          colors: "#E66FD2"
        }
      },
      title: {
        text: "Systolic",
        style: {
          color: "#E66FD2"
        }
      }
    },
    {
      opposite: true,
      axisTicks: {
        show: true
      },
      axisBorder: {
        show: true,
        color: "#8C6FE6"
      },
      labels: {
        style: {
          colors: "#8C6FE6"
        }
      },
      title: {
        text: "Diastolic",
        style: {
          color: "#8C6FE6"
        }
      }
    }
  ],
  markers: {
  size: [7, 7]
},
  tooltip: {
    shared: false,
    intersect: true,
    x: {
      show: false
    }
  },
  legend: {
    horizontalAlign: "left",
    offsetX: 40
  }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();

</script>
</html>