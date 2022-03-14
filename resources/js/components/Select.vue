<template>
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>{{ title_1 }}</label>
            <select class="form-control form-control-sm thingSelect" style="width: 100%" v-model="item_first_Selected">
                <option selected="selected" value="">{{ title_1 }}</option>
                <option v-for="item in items_info" :key="item.id" :value="item">
                    {{ item.name.en }}
                </option>
            </select>
            <input type="hidden" :name="name_1" :value="item_first_Selected.id" />
        </div>
        <div class="col-md-6">
            <label>{{ title_2 }}</label>
            <select class="form-control form-control-sm thingSelect" style="width: 100%" v-model="item_2Selected">
                <option selected="selected" value="">{{ title_2 }}</option>
                <option v-for="item_2 in sub_item == 'cities' ? item_first_Selected.cities : item_first_Selected.sub_categories" :key="item_2.id" :value="item_2">
                    {{ item_2.name.en }}
                </option>
            </select>
            <input type="hidden" :name="name_2" :value="item_2Selected.id" />
        </div>
    </div>
</div>
</template>

<script>
export default {
    props:[
        'sub_item',
        'items',
        'title_1',
        'title_2',
        'name_1' ,
        'name_2'
        ],
    data(){
        return {
           item_2Selected: '',
           item_first_Selected: '',
           items_info: JSON.parse(this.items),
           sub: JSON.parse(JSON.stringify(this.sub_item))
        }
    },

    mounted(){
        console.log(this.sub_item);
    }
}
</script>
