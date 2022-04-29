<template>
    <span>
     <span v-for="(input, k) in ar_inputs" :key="k">
      <div class="row">
        <div class="col-md-11 mt-2">
          <label for="">Arabic Silde 3</label>
          <input
            type="file"
            name="ar_images[]"
            id=""
            class="form-control from-control-sm"
          />
          <br>
          <label for="">Url 3</label>
           <input type="text" name="ar_url[]" class="form-control form-control-sm">
        </div>
        <!-- <div > -->
          <span class="col-md-1 mt-2">
            <div class="row">
              <div class="col-md-12"><label for="">More</label></div>
              <div class="col-md-12">
                <i
              class="fas fa-minus-circle"
              style="color: red"
              @click="ar_remove(k, 1)"
              v-show="k || (!k && ar_inputs.length > 1)"
            ></i>
            <i
              class="fas fa-plus-circle"
              style="color: blue"
              @click="ar_add(k, 1)"
              v-show="k == ar_inputs.length - 1"
            ></i>
              </div>
            </div>
            
            
          </span>
        <!-- </div> -->
      </div>
     </span>
    </span>
</template>

<script>
export default {
  data() {
    return {
       ar_inputs: [{
          image: "",
        }],
    };
  },
  methods: {
    ar_add(k, tr) {
      this.ar_inputs.push({
        image: "",
      });
    },
    ar_remove(index, tr) {
      this.ar_inputs.splice(index, 1);
    },
  },
};
</script>

<style>
input[type="file"]::-webkit-file-upload-button {
  /* background: #ffffff; */
  margin: 0px !important;
  border: none;
  padding: 2px;
  border-radius: 5px;
  /* color: #ffffff; */
}
</style>