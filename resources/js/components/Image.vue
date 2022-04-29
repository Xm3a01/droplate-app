<template>
    <span>
     <span v-for="(input, k) in inputs" :key="k">
      <div class="row">
        <div class="col-md-11 mt-2">
          <label for="">{{ label }}</label>
          <input
            type="file"
            name="images[]"
            id=""
            class="form-control from-control-sm"
          />
        </div>
        <!-- <div > -->
          <span class="col-md-1 mt-2">
            <div class="row">
              <div class="col-md-12"><label for="">More</label></div>
              <div class="col-md-12">
                <i
              class="fas fa-minus-circle"
              style="color: red"
              @click="remove(k, 1)"
              v-show="k || (!k && inputs.length > 1)"
            ></i>
            <i
              class="fas fa-plus-circle"
              style="color: blue"
              @click="add(k, 1)"
              v-show="k == inputs.length - 1"
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
  props:['label'],
  data() {
    return {
       inputs: [{
          image: "",
        }],
    };
  },
  methods: {
    add(k, tr) {
      this.inputs.push({
        image: "",
      });
    },
    remove(index, tr) {
      this.inputs.splice(index, 1);
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