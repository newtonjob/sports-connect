<x-app>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Profile -->
            <div class="card bg-primary">
                <div class="card-body profile-user-box">

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-lg" id="div-avatar">
                                        <img src="{{ $user->photo }}" alt="" class="rounded-circle img-thumbnail">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <h4 class="mt-1 mb-1 text-white">{{ $user->name }}</h4>
                                        <p class="font-13 text-white-50 text-uppercase">
                                            {{ $user->sports->implode('name', ', ') }}
                                        </p>

                                        <ul class="mb-0 list-inline text-light">
                                            <li class="list-inline-item me-3">
                                                <h5 class="mb-1">Email</h5>
                                                <p class="mb-0 font-13 text-white-50">{{ $user->email }}</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 class="mb-1">Phone</h5>
                                                <p class="mb-0 font-13 text-white-50">{{ $user->phone }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-sm-4">
                            <div class="text-center mt-sm-0 mt-3 text-sm-end">

                                <form action="{{ route('api.users.update', $user) }}" id="form-photo">
                                    @method('put')
                                    <label for="photo" class="btn btn-light rounded-3" type="submit">
                                        <i class="mdi mdi-account-edit me-1"></i> Change Photo
                                    </label>
                                    <input class="form-control" type="file" accept="image/jpeg,image/png"
                                           name="photo" id="photo" style="display: none;">
                                </form>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row -->

                </div> <!-- end card-body/ profile-user-box-->
            </div><!--end profile/ card -->
        </div> <!-- end col-->
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#profile" data-bs-toggle="tab" aria-expanded="false"
                               class="nav-link rounded-0 active">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#change-password" data-bs-toggle="tab" aria-expanded="true"
                               class="nav-link rounded-0">
                                Change Password
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="profile">
                            <form action="{{ route('api.users.update', $user) }}" class="x-submit">
                                @method('put')

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Bio</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ $user->name }}" id="name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" value="{{ $user->email }}"
                                                   class="form-control" id="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="tel" id="phone" name="phone" value="{{ $user->phone }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div> <!-- end row -->
                                <div>
                                    <button type="submit" class="btn btn-success mt-2 rounded-3">Update Profile</button>
                                </div>
                            </form>
                        </div>
                        <!-- end tab-pane -->
                        <div class="tab-pane" id="change-password">
                            <!-- comment box -->
                            <div class="mt-2">
                                <form action="{{ route('api.users.update', $user) }}"
                                      class="x-submit" data-then="reload">
                                    @method('put')

                                    <div class="mb-3">
                                        <label class="form-label" for="current_password">Your Current Password</label>
                                        <input type="password" class="form-control" name="current_password"
                                               id="current_password" min="5" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password">Create a new Password</label>
                                        <input type="password" class="form-control" name="password"
                                               id="password" min="5" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password_confirmation">Repeat new Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                               id="password_confirmation" min="5" required>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success waves-effect rounded-3">
                                            <i class="uil-lock-access"></i> Change Password
                                        </button>
                                    </div>
                                </form>
                            </div> <!-- end .border-->
                            <!-- end comment box -->
                        </div>
                    </div> <!-- end tab-content -->
                </div>
            </div> <!-- end card -->
        </div>
    </div>
</x-app>
