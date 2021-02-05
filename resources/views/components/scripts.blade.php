<script>
    const laravelBladeSortable = () => {
        return {
            sortOrder: [],
            animation: 150,
            ghostClass: '',

            wireComponent: null,
            wireOnSortOrderChange: null,

            init() {
                this.sortOrder = [].slice.call(this.$refs.root.children)
                    .map(child => child.dataset.sortKey)
                    .filter(sortKey => sortKey)

                window.Sortable.create(this.$refs.root, {
                    animation: this.animation,
                    ghostClass: this.ghostClass,
                    onEnd: evt => {
                        this.sortOrder = [].slice.call(evt.from.children)
                            .map(child => child.dataset.sortKey)
                            .filter(sortKey => sortKey)
                        if (!this.wireComponent) {
                            return
                        }
                        this.wireComponent.call(this.wireOnSortOrderChange, this.sortOrder)
                    },
                });
            }
        }
    }
</script>
