                            <div class="modal fade" id="exampleModalCenter{{$user->id}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Client information</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div> 
                                            <div class="modal-body">
                                               <p><img src="{{asset('images')}}/{{$user->image}}" alt="image" width="200"></p>
                                                <p class="badge badge-pill badge-warning">Role :&nbsp; {{ucfirst($user->role->name)}}</p>
                                               <h5><p>Name : &nbsp;  {{$user->name}}</p>
                                                <p>Email :  &nbsp; {{$user->email}}</p>
                                                <p>Address : &nbsp;  {{$user->address}}</p>
                                                <p>Phone Number : &nbsp;  {{$user->phone_number}}</p>
                                                <p>Bio : &nbsp;  {{$user->description}}</p></h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>