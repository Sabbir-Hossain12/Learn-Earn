<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pinyon+Script|Rochester" rel="stylesheet">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Open Sans', sans-serif;
        }

        .pm-certificate-container {
            width: 800px;
            height: 600px;
            background-color: #618597;
            padding: 30px;
            box-shadow: 0 0 5px rgba(0, 0, 0, .5);
            position: relative;
        }

        .outer-border, .inner-border, .pm-certificate-border {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            border: 2px solid #fff;
        }

        .outer-border {
            width: 794px;
            height: 594px;
            top: 3px;
        }

        .inner-border {
            width: 730px;
            height: 530px;
            top: 35px;
        }

        .pm-certificate-border {
            width: 720px;
            height: 520px;
            top: 40px;
            background-color: #fff;
            border: 1px solid #E1E5F0;
            padding: 0;
        }

        .pm-certificate-title {
            text-align: center;
            margin-top: 40px;
            font-family: 'Pinyon Script', cursive;
        }

        .pm-certificate-title h2 {
            font-size: 34px;
            margin: 0;
        }

        .pm-certificate-block {
            width: 650px;
            margin: 40px auto 0;
        }

        .underline {
            border-bottom: 1px solid #777;
            padding: 5px;
            margin-bottom: 15px;
        }

        .bold {
            font-weight: bold;
        }

        .block {
            display: block;
        }

        .text-center {
            text-align: center;
        }

        .pm-earned-text {
            font-size: 30px;
            font-family: 'Pinyon Script', cursive;
        }

        .pm-credits-text {
            font-size: 15px;
            font-weight: bold;
        }

        .pm-certified {
            font-size: 12px;
            text-align: center;
        }

        .pm-empty-space {
            height: 40px;
            width: 100%;
        }

        .pm-certificate-footer {
            display: flex;
            justify-content: space-between;
            width: 650px;
            margin: 40px auto 0;
        }

        .pm-certified .bold {
            font-size: 13px;
        }
        .pm-earned-text2
        {
            font-size: 20px;
            font-family: 'Pinyon Script', cursive;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="pm-certificate-container">
    <div class="outer-border"></div>
    <div class="inner-border"></div>

    <div class="pm-certificate-border">
        <div class="pm-certificate-title">
            <h2>{{ $basicInfo->site_name ?? '' }} Certificate of Completion</h2>
        </div>

        <div class="pm-certificate-block">
            <div class="underline text-center">
                <span class="bold">This certificate is presented to</span>
            </div>

            <div class="text-center">
                <span class="pm-earned-text block">{{ Auth::user()->name ?? '' }}</span>
                {{--                <span class="pm-credits-text block">PD175: 1.0 Credit Hours</span>--}}
            </div>

            <div class="underline text-center">
                <span class="bold">for successfully completing the following Course:</span>
                <span class="pm-earned-text2 block mt-2">{{ $course->title ?? '' }}</span>

            </div>

            {{--            <div class="text-center" style="margin-top: 20px;">--}}
            {{--                <span class="pm-earned-text block">for successfully completing the following Course:</span>--}}
            {{--            </div>--}}

            {{--            <div class="underline text-center" style="margin-top: 10px;">--}}
            {{--                <span class="pm-credits-text block">BPS PGS Initial PLO for Principals at Cluster Meetings</span>--}}
            {{--            </div>--}}
        </div>

        <div class="pm-certificate-footer">
            <div class="pm-certified">
                {{--                <span class="pm-credits-text block">Buffalo City School District</span>--}}
                <span class="pm-empty-space  block"></span>
                <span class="pm-empty-space block"></span>
                <span class="pm-empty-space underline block">{{ today()->format('m/d/Y') }}</span>
                {{--                <span class="bold block">Crystal Benton</span>--}}
                {{--                <span class="bold block">Instructional Specialist II, Staff Development</span>--}}
                <span class="pm-credits-text block">Issued Date</span>
            </div>
            <div class="pm-certified">
                {{--                <span class="pm-credits-text block">Buffalo City School District</span>--}}
                <span class="pm-empty-space  block"></span>
                <span class="pm-empty-space block">
                    <img loading="lazy" src="{{ asset($basicInfo->signature_text) }}" alt="Signature" height="60" width="120">
                </span>
                <span class="pm-empty-space underline block">
                </span>
                {{--                <span class="bold block">Crystal Benton</span>--}}
                {{--                <span class="bold block">Instructional Specialist II, Staff Development</span>--}}
{{--                <span class="pm-credits-text block">Person 1</span>--}}
                <span class="pm-credits-text block">{{ $basicInfo->signature_author ?? '' }}</span>
            </div>
        </div>
    </div>
</div>
<script>
    window.print();
</script>
</body>
</html>
