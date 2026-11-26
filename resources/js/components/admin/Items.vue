<template>
    <div>
        <div class="body-admin-items">
            <item v-if="item_id !== 0" :items_app="this"></item>
            <item_new v-if="item_new" :items_app="this"></item_new>
        </div>
        <div class="footer-admin-items">
            <div class="row" style="margin: 0; flex-wrap: nowrap !important;">
                <div class="admin-item-before" @click="newitemview" id="item-new">
                    <div :class="'admin-item admin-item-new ' + (item_new === true ? 'selected' : '')"><i class="fas fa-plus"></i></div>
                </div>
                <div class="admin-item-before" v-for="(item, index) in items" :id="'item-'+item.id" @click="openitem(item.id, index)">
                    <div :class="'admin-item d-flex ' + (item.id === item_id ? 'selected': '')">
                        <img :src="item.img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Item from "./Item";
import Item_new from "./Item_new";
export default {
    name: "Items",
    props: ['admin'],
    components: {Item, Item_new},
    data() {
        return {
            items: [],
            nbr_items: null,
            item_id: 0,
            item_index: 0,
            item_new: true
        }
    },
    mounted() {
        this.loadAll();
    },
    methods: {
        loadAll(){
            this.admin.req.post('bo_items/loadall').then(response => {
                this.items = response.data;
                this.nbr_items = this.items.length;
                console.log(this.items);

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        newitemview()
        {
            if(this.item_new === false)
            {
                this.item_new = true;
                this.item_id = 0;
                this.item_index = 0;
            }
        },
        openitem(id, index)
        {
            this.item_new = false;
            this.item_id = id;
            this.item_index = index;
            //console.log("item_new : " + this.item_new + " item_id : " + this.item_id + " item_index : " + this.item_index );
        }
    }
}
</script>
