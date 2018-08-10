<div class="card-body">
  <div class="row">
      <div class="col-md-6">
          <div id="google-map" style="height:200px;width:auto;"></div>
      </div>
      <div class="col-md-6">
          <p class="card-text">
              <h5 class="card-title">{{ $clinic->clinic_name }}</h5>
              <span id='lat' hidden>{{ $clinic->location_latitude }}</span>
              <span id='long' hidden>{{ $clinic->location_longitude }}</span>
              <ul>
                  <li>
                      <strong>Address:</strong>
                      <p>{{ $clinic->location_address }}</p>
                  </li>
                  <li>
                      <strong>Area:</strong>
                      <p>{{ $clinic->area }}</p>
                  </li>

              </ul>
          </p>
      </div>
  </div>

<a href="#" class="btn btn-primary float-right">Apply Now!</a>

</div>
