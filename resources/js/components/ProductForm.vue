<template>
  <div class="card-body">
    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label>Categories</label>
          <select
            class="form-control form-control-sm thingSelect"
            name="category_id"
            style="width: 100%"
          >
            <option selected="selected" value="">Category name</option>
            <option
              v-for="category in categories_info"
              :key="category.id"
              :selected="product_info.category_id == category.id"
              :value="category.id"
            >
              {{ category.name.en }}
            </option>
          </select>
         
        </div>
        <div class="col-md-6">
          <label>Sub Categories</label>
          <select
            class="form-control form-control-sm thingSelect"
            name="sub_category_id"
            style="width: 100%"
          >
            <option selected="selected" value="">Sub Categories</option>
            <option
              v-for="sub_category in sub_categories_info"
              :key="sub_category.id"
              :selected="product_info.sub_category_id == sub_category.id"
              :value="sub_category.id"
            >
              {{ sub_category.name.en }}
            </option>
          </select>
          <!-- <input type="hidden" name="sub_category_id" :value="subCategory.id" /> -->
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label>Product AR name</label>
          <input
            name="ar_name"
            v-model="product_info.name.ar"
            class="form-control form-control-sm thingSelect"
            style="width: 100%"
            placeholder="Arabic name"
          />
          <!-- <input type="hidden" name="block_id " :value="centerSelect.id"> -->
        </div>
        <div class="col-md-6">
          <label>Product EN name</label>
          <input
            name="en_name"
            v-model="product_info.name.en"
            class="form-control form-control-sm"
            style="width: 100%"
            placeholder="English name"
          />
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="exampleInputEmail1">Quantity</label>
          <input
            type="text"
            v-model="product_info.quantity"
            name="quantity"
            class="form-control form-control-sm"
            id="exampleInputEmail1"
            placeholder="Enter Quantity"
          />
        </div>
        <div class="col-md-6">
          <label for="exampleInputEmail1">Vat</label>
          <input
            type="text"
            name="vat"
            v-model="product_info.vat"
            class="form-control form-control-sm"
            id=""
            placeholder="Enter Vat"
          />
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-4">
          <label for="exampleInputEmail1">Selling price</label>
          <input
            type="text"
            name="selling_price"
            v-model="product_info.selling_price"
            class="form-control form-control-sm"
            id=""
            placeholder="Enter Selling price"
          />
        </div>
        <!-- purchasing_price -->
        <div class="col-md-4">
          <label for="exampleInputEmail1">Wholesale price</label>
          <input
            type="text"
            name="wholesale_price"
            v-model="product_info.wholesale_price"
            class="form-control form-control-sm"
            id="exampleInputEmail1"
            placeholder="Enter Wholesale price"
          />
        </div>
        <div class="col-md-4">
          <label for="exampleInputEmail1">Purchasing price</label>
          <input
            type="text"
            name="purchasing_price"
            v-model="product_info.purchasing_price"
            class="form-control form-control-sm"
            id="exampleInputEmail1"
            placeholder="Enter Purchasing price"
          />
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-12">
          <label for="exampleInputEmail1">English Description</label>
          <textarea
            type="text"
            name="en_description"
            v-model="product_info.descripton.en"
            class="form-control form-control-sm"
            id="exampleInputEmail1"
            placeholder="Enter Description"
          >
          </textarea>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-12">
          <label for="exampleInputEmail1">Arabic Description </label>
          <textarea
            type="text"
            name="ar_description"
            v-model="product_info.descripton.ar"
            class="form-control form-control-sm"
            id="exampleInputEmail1"
            placeholder="Enter Description"
          >
          </textarea>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-12">
          <label for="exampleInputFile">Upload Image</label>
          <input
            type="file"
            name="image"
            id=""
            class="form-control form-control-sm"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// $('.thingSelect').select2();
export default {
  props: ["categories", "errors", "product" , "sub_categories"],
  data() {
    return {
      inputs: [
        {
          image: "",
        },
      ],
      categorySelected: "",
      subCategory: "",
      categories_info: JSON.parse(this.categories),
      sub_categories_info: JSON.parse(this.sub_categories),
      product_info: this.product
        ? JSON.parse(this.product)
        : { name: {}, descripton: {} },
      drivs: {},
      farmSelect: "",
      errs: this.errors ? JSON.parse(this.errors) : [],
      centerSelect: "",
      unload: 0,
      load: 0,
      net: 0,
      loadType: "",
    };
  },

  mounted() {
    // console.log(this.errors)
    // this.errs = JSON.parse(this.errors);
    console.log(this.errs);
  },

  computed: {
    calculate() {
      return this.load - this.unload;
    },
  },

  methods: {
    add(k, tr) {
      this.inputs.push({
        number: "",
        image: "",
        reason: "",
      });
    },
    remove(index, tr) {
      this.inputs.splice(index, 1);
    },
    category_name(category) {
      return category.id == this.product_info.category_id
        ? (this.categorySelected = category)
        : category;
    },
    sub_category_name(sub_category) {
      return sub_category.id == this.product_info.sub_category_id
        ? (this.subCategory = sub_category)
        : sub_category;
    },
  },
};
</script>

<style scoped>
input[type="file"]::-webkit-file-upload-button {
  /* background: #ffffff; */
  margin: 0px !important;
  border: none;
  padding: 2px;
  border-radius: 5px;
  /* color: #ffffff; */
}
</style>
