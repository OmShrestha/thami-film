<script>
    $(document).ready(function () {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        const tagSelector = $('#tag-selector');

        tagSelector.select2({
            tags: true,
            tokenSeparators: [',', ' '],
            ajax: {
                url: '{{ route('admin.tags.search') }}',
                dataType: 'json',
                delay: 200,
                data: function (params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (tag) {
                            return {
                                id: tag.id,
                                text: tag.name
                            };
                        })
                    };
                },
                cache: true
            },
            createTag: function (params) {
                const term = $.trim(params.term);

                if (term === '') {
                    return null;
                }

                return {
                    id: `new-${term}`,
                    text: term,
                    newTag: true
                };
            }
        });

        tagSelector.on('select2:select', function (e) {
            const data = e.params.data;

            if (data.newTag) {
                $.ajax({
                    url: '{{ route('admin.tags.create') }}',
                    type: 'POST',
                    data: JSON.stringify({name: data.text}),
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (tag) {
                        tagSelector.find(`option[value='${data.id}']`).remove();
                        const newOption = new Option(tag.name, tag.id, false, true);
                        tagSelector.append(newOption).trigger('change');
                    }
                });
            }
        });
    });

</script>
