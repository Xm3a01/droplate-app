<script>
export default {
    data() {
        return {
            vat: 15,
            vatFlag: 0
        }
    },
    methods: {
        save() {
            document.getElementById('setting-form').submit();
        }
    }
}
</script>