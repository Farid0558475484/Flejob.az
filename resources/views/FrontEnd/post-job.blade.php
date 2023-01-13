<!doctype html>
<html lang="zxx">

<head>

    @include('FrontEnd.Component.cdn')

</head>

<body>

    <!-- Navbar Area Start -->
    @include('FrontEnd.Component.Navbar')
    <!-- Navbar Area End -->
    @include('FrontEnd.Component.Preloader')

    <!-- Page Title Start -->
    <section class="page-title title-bg3">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Post a Job</h2>
                <ul>
                    <li>
                        <a href="{{ route('Hom', app()->getLocale()) }}">Home</a>
                    </li>
                    <li>Post a Job</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
    <!-- Page Title End -->

    <!-- Post Job Section Start -->
    <div class="job-post ptb-100">
        <div class="container">
            {{-- //show errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="job-post-from" action="{{ route('PostAJobPost', app()->getLocale()) }}" method="POST">
                @csrf
                <h2>Fill Up Your Job information</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input name="VacancyName" type="text" class="form-control" id="exampleInput1"
                                placeholder="Job Title or Keyword" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input name="Email" type="text" class="form-control" id="exampleInput1"
                                placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Category</label>
                            <select name="Category" class="form-control">
                                @foreach ($Categories as $Category)
                                    <option value="{{ $Category->id }}">{{ $Category->Category_lang->CategoryName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" value="{{ session()->get('CompanyUser')->id }}" name="CompanyUser">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job City </label>
                            <select name="City" class="form-control">
                                @foreach ($Cities as $City)
                                    <option value="{{ $City->id }}">{{ $City->CityLang->CityName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Person Name</label>
                            <input name="PersonName" type="text" class="form-control" id="exampleInput1"
                                placeholder="Enter Your Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Person Phone</label>
                            <input name="PersonPhone" type="text" class="form-control" id="exampleInput1"
                                placeholder="Enter Your Phone" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Job Description</label>
                            <textarea class="form-control description-area" id="exampleFormControlTextarea1" rows="6"
                                placeholder="Job Description" required name="VacancyDescription"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Job Requirement</label>
                            <textarea class="form-control description-area" id="exampleFormControlTextarea1" rows="6"
                                placeholder="Job Requirement" name="VacancyRequirements" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vacancy Salary</label>
                            <input name="VacancySalary" type="number" class="form-control" id="exampleInput1"
                                placeholder="Salary" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" style="float: right; margin-right:50px;" class="post-btn">
                            Post A Job
                        </button>
                    </div>
                    {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Job Title</label>
                                <input type="text" class="form-control" id="exampleInput1" placeholder="Job Title or Keyword" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Job Category</label>
                                <select class="category">
                                    <option data-display="Category">Category</option>
                                    <option value="1">Web Development</option>
                                    <option value="2">Graphics Design</option>
                                    <option value="4">Data Entry</option>
                                    <option value="5">Visual Editor</option>
                                    <option value="6">Office Assistant</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="form-control" id="exampleInput2" placeholder="Company Name" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Company Email</label>
                                <input type="email" class="form-control" id="exampleInput3" placeholder="e.g. hello@company.com" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Company Website (Optional)</label>
                                <input type="text" class="form-control" id="exampleInput4" placeholder="e.g www.companyname.com">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" class="form-control" id="exampleInput5" placeholder="e.g. London" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Job Type</label>
                                <select class="category">
                                    <option data-display="Job Type">Job Type</option>
                                    <option value="1">Full Time</option>
                                    <option value="2">Part Time</option>
                                    <option value="4">Freelancer</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Job Tags</label>
                                <input type="text" class="form-control" id="exampleInput6" placeholder="e.g. web design, graphics design, video editing" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Salary (Optional)</label>
                                <input type="number" class="form-control" id="exampleInput7" placeholder="e.g. $20,000">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Experience</label>
                                <input type="text" class="form-control" id="exampleInput8" placeholder="e.g. 1 year" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Job Description</label>
                                <textarea class="form-control description-area" id="exampleFormControlTextarea1" rows="6" placeholder="Job Description" required></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="post-btn">
                                Post A Job
                            </button>
                        </div> --}}
                </div>
            </form>
        </div>
    </div>
    <!-- Post Job Section End -->


    <!-- Footer Area Start -->
    @include('FrontEnd.Component.Footer')

</html>
