<template>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6" v-if="tranfer.supervisorSig == 0 && role != 'driver-supervisor'">
        <div class="form-group">
          <input type="checkbox" value="1" class="" name="sig" id="" v-model="sig">
          <label for="" class=""> Your signuture </label> <br> <br>
          <button v-if="sig == true" type="submit" class="btn btn-info btn-xs">Signuture</button>

          </div>
      </div>
      <div class="col-md-6" v-if="role == 'driver-supervisor' && tranfer.deriverSig == 0">
          <div class="form-group">
          <input type="checkbox" value="1" class="" name="sig" id="" v-model="sig">
          <label for="" class=""> Your signuture </label> <br> <br>
          <button v-if="sig == true" type="submit" class="btn btn-info btn-xs">Signuture</button>

          </div>

      </div>
      <div class="col-md-6" v-if="tranfer.supervisorSig == 1 && role != 'driver-supervisor'">
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="exampleInputEmail1" class="text-sm">Kilometres number</label>
              <input
               :disabled="tranfer.recive"
                type="text"
                name="km"
                class="form-control form-control-sm"
                placeholder="Enter Kilometres number"
              />
            </div>
            <div class="col-md-6">
              <label for="exampleInputEmail1" class="text-sm">Load Weight in {{place}}</label>
              <input
                v-model="load"
                :disabled="tranfer.recive"
                type="text"
                name="loadWeight"
                class="form-control form-control-sm"
                id="exampleInputEmail1"
                placeholder="Enter Loading Weight"
              />
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="exampleInputEmail1" class="text-sm">Un Load Weight in {{place}} </label>
              <input
                v-model="unload"
                :disabled="tranfer.recive"
                type="text"
                name="unLoadWeight"
                class="form-control form-control-sm"
                placeholder="Enter Un Loading Weight"
              />
            </div>
            <div class="col-md-6">
              <label for="exampleInputEmail1" class="text-sm">Net Weight in {{place}}</label>
              <input
                type="text"
                v-model="netWeight"
                disabled
                class="form-control form-control-sm"
                id="exampleInputEmail1"
                placeholder="Enter Net Weight"
              />
              <input :value="netWeight" type="hidden" name="netWeight" />
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row justify-content-between">
                  <div class="col-md-6 text-lg">List Of Damages</div>
                  <div class="col-md-2">
                    <button
                      @click.prevent="reason = !reason"
                      class="btn btn-xs btn-info"
                    >
                      {{reason ? 'Hide' : btn }}
                    </button>
                  </div>
                </div>
              </div>
              <div class="card-body overflow-auto" style="max-height:400px" v-if="reason">
                <div v-for="damage in damags" :key="damage.id" class="card mb-3 overflow-hidden">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img
                      
                        :src="'/msg/logs/public/'+damage.image"
                        class="card-img h-100"
                        alt="..."
                      />
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Car Id {{damage.number == 0 ? 'Car Propraite' : damage.number}}</h5>
                        <p class="card-text">
                          <small class="text-muted"
                            >Damge reason</small
                          >
                        </p>
                        <p class="card-text">
                         {{damage.reason}}
                        </p>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="col-md-12">
              <label for="exampleInputEmail1">Any other damages ? </label>
              <div class="form-check">
                <div class="row">
                  <div class="col-md-6">
                    <input
                      v-model="yes"
                      class="form-check-input"
                      value="1"
                      type="radio"
                      name="beforLoading"
                      checked=""
                    />
                    <label class="form-check-label">Yes</label>
                  </div>
                  <div class="col-md-6">
                    <input
                      v-model="yes"
                      class="form-check-input"
                      value="0"
                      type="radio"
                      name="beforLoading"
                      checked=""
                    />
                    <label class="form-check-label">No</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 my-4 warperContext" v-if="yes == 1">
              <!-- <small class="mb-2">Another Damage</small><br> -->
              <div class="form-group" v-for="(input, k) in inputs" :key="k">
                <div class="row">
                  <div class="col-md-3">
                    <label for="exampleInputFile">Bales</label>
                    <input
                      type="text"
                      name="number[]"
                      class="form-control form-control-sm"
                      id=""
                      placeholder="Number"
                    />
                  </div>
                  <div class="col-md-4">
                    <label for="exampleInputFile">Images</label>
                    <div class="input-group">
                      <!-- <div class="custom-file"> -->
                      <input
                        type="file"
                        name="images[]"
                        class="form-control form-control-sm"
                        id="exampleInputFile"
                      />
                      <!-- </div> -->
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="exampleInputFile">Reason</label>
                    <input
                      type="text"
                      name="reason[]"
                      class="form-control form-control-sm"
                      id=""
                      placeholder="Reason"
                    />
                  </div>
                  <div class="col-md-1" style="margin-top: 32px">
                    <!-- <label for="exampleInputFile"></label> -->
                    <span>
                      <i
                        class="fas fa-minus-circle"
                        style="color: red"
                        @click="remove(k, 0)"
                        v-show="k || (!k && inputs.length > 1)"
                      ></i>
                      <i
                        class="fas fa-plus-circle"
                        style="color: blue"
                        @click="add(k, 0)"
                        v-show="k == inputs.length - 1"
                      ></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-100 col-md-1"></div>
      <div class="col-md-5">
        <div class="row">
          
          <div class="col-md-12">
              <label for="">Details</label>
            <table class="table table-bordered bg-gray">
              <!-- <thead> -->
              <tr>
                <th>Farm name</th>
                <td>{{tranfer.farm.name}}</td>
                <th>Seed Type</th>
                <td>{{tranfer.seedType}}</td>
              </tr>
              <tr>
                <th>Farm Center</th>
                <td>{{tranfer.center.name}}</td>
                <th>Unloaded weight</th>
                <td>{{tranfer.unLoadWeight}}</td>
              </tr>
              <tr>
                <th>Farm block</th>
                <td>{{tranfer.block.name}}</td>
                <th>Loaded weight</th>
                <td>{{tranfer.loadWeight}}</td>
              </tr>
              <tr>
                <th>Car ID</th>
                <td>{{tranfer.carId}}</td>
                <th>Net Weight</th>
                <td>{{tranfer.netWeight}}</td>
              </tr>
               <tr>
                <th>Kilometres number</th>
                <td>{{tranfer.km}} /<small class="test-sm">KM</small></td>
                <th>Loading Type</th>
                <td>{{tranfer.loadType}}</td>
              </tr>
               <tr>
                <th>Quantity</th>
                <td>{{tranfer.quantity}}</td>
               <th>Driver signature</th>
                <td>{{tranfer.driver.name}}</td>
              </tr>

               <tr>
                <th class="bg-danger">Recive Load Weight</th>
                <td>{{this.tranfer.recive ? this.tranfer.recive.loadWeight : 'N/A' }}</td>
               <th class="bg-danger">Recive Un Load Weight</th>
               <td>{{this.tranfer.recive ? this.tranfer.recive.unLoadWeight : 'N/A'}}</td>
              </tr>

              <tr>
                <th class="bg-danger">Recive Net Weight </th>
                <td>{{this.tranfer.recive ? this.tranfer.recive.netWeight : 'N/A'}}</td>
                <th class="bg-danger">Kilometres number after recive </th>
                <td>{{this.tranfer.recive ? this.tranfer.recive.km : 'N/A'}} /<small class="test-sm">KM</small></td>
              </tr>

              <!-- recive -->
              
              <!-- </thead> -->
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props:['trans' , 'place' , 'damages' , 'role'],
  data() {
    return {
      reason: false,
      load: 0,
      unload: 0,
      yes: "",
      tranfer: JSON.parse(this.trans),
      damags: JSON.parse(this.damages),
      btn: "View",
      sig: false,
    //   recive: this.tranfer.recive ? JSON.parse(this.trans).recive : {},
      inputs: [
        {
          number: "",
          reason: "",
          image: "",
        },
      ],
    };
  },
  computed: {
    netWeight() {
      return this.load - this.unload;
    },
  },
  methods: {
    add() {
      this.inputs.push({
        number: "",
        image: "",
        reason: "",
      });
    },
    remove(index) {
      this.inputs.splice(index, 1);
    },
  },
};
</script>

<style scoped>
.card-horizontal {
  display: flex;
  flex: 1 1 auto;
}
input[type="file"]::-webkit-file-upload-button {
  display: none;
}
</style>