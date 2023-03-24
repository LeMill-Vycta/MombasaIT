                            <div class="modal fade" id="exampleModalCenter{{$service->id}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Service information</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div> 
                                            <div class="modal-body">
                                               <p class="text-center"><img src="{{asset('images/services')}}/{{$service->image}}" alt="image" width="300"></p>
                                                <h5>Name : &nbsp; {{$service->name}}</h5>
                                                <h5>Service Details :&nbsp;</h5><p>{{$service->description}}</p>
                                                <h5>Average Price :&nbsp; {{$service->average_price}}</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>