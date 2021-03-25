<script>
    const laravelBladeSortable = () => {
        return {
            sortOrder: [],
            animation: 150,
            ghostClass: '',
            dragHandle: null,
            group: null,

            wireComponent: null,
            wireOnSortOrderChange: null,

            init() {
                this.sortOrder = this.computeSortOrderFromChildren()

                window.Sortable.create(this.$refs.root, {
                    handle: this.dragHandle,
                    animation: this.animation,
                    ghostClass: this.ghostClass,
                    group: this.group,
                    onSort: evt => {
                        this.sortOrder = this.computeSortOrderFromChildren()

                        if (!this.wireComponent) {
                            return
                        }

                        this.wireComponent.call(this.wireOnSortOrderChange, this.sortOrder)
                    },
                });
            },

            computeSortOrderFromChildren() {
                return [].slice.call(this.$refs.root.children)
                    .map(child => child.dataset.sortKey)
                    .filter(sortKey => sortKey)
            }
        }
    }
</script>
