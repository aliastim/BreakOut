<template>
    <div>
        <shop-before></shop-before>
        <div class="breakout-body">
            <global-footer></global-footer>
        </div>
    </div>
</template>
<script>
import ShopBefore from "./before/ShopBefore";
import GlobalFooter from "./layout/Footer";
export default {
    name: "Shop",
    components: {ShopBefore, GlobalFooter}
}
</script>
<style>

</style>
