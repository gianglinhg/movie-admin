ClassicEditor
  .create(document.querySelector('#ckeditor'))
  .catch(error => {
    console.error(error);
  });
$(document).ready(function () {
  $('input[name="name"]').on('keyup', function () {
    const slug = changeToSlug($(this).val());
    $('input[name="slug"]').val(slug);
  })
  $('#episode-server-list').on('click','.nav-link',function(){
    $('#episode-server-list').find('.nav-link').removeClass('border');
    $(this).addClass('border');
  })
  select2('#directors', {
    tags: true,
  })
  select2('#actors', {
    tags: true,
  })
  select2('#tags', {
    tags: true,
  })
});

function updateEpisodeServer(el) {
  $($(el).attr('href')).find('.episode-server').val($(el).html().trim());
  $($(el).attr('href')).find('.add-episode-btn').data('server-name', $(el).html().trim());
}

function updateNameAttr() {
  $('.episode').each((index, episode) => {
    $(episode).find('[data-attr-name]').each((i, attr) => {
      const attrName = $(attr).attr('data-attr-name').split('.').reduce((a, b) =>
        `${a}[${b}]`, '')
      $(attr).attr('name', `episodes[${index}]${attrName}`)
    })
  })
}

const templateEpisode = (i, server, item = null, fake_name = 0) => {
  var [name, link, type, slug, id] = ['', '', '', '', ''];
  if (item) {
    let countItem = item.split('|').length;
    if (countItem === 1) {
      link = item;
    } else {
      [name, link, type, slug, id] = item.split('|');
    }

    if (!name) {
      name = fake_name;
    }
    if (!type) {
      if (link.indexOf('.m3u8') !== -1) type = 'm3u8'
      if (link.indexOf('.mp4') !== -1) type = 'mp4'
    }
    if (!slug) slug = `tap-${change_alias(name.toString())}`;
  }
  return `<tr class="episode">
            <input type="hidden" name="episodes[${i}][id]" value="${i}" data-attr-name="id">
            <input type="hidden" class="episode-server" value="${server}" data-attr-name="server">
            <td><input type="text" placeholder="${name || '1'}" value="${name || '1'}" class="ep_name form-control"
                data-attr-name="name">
            </td>
            <td><input type="text" placeholder="${slug || 'tap-1'}" value="${slug || 'tap-1'}" class="form-control"
                data-attr-name="slug"></td>
            <td>
                <select data-attr-name="type" class="form-control">
                <option value="embed" ${'embed' == type ? 'selected' : ''}>Nhúng</option>
                <option value="mp4" ${'mp4' == type ? 'selected' : ''}>MP4</option>
                <option value="m3u8" ${'m3u8' == type ? 'selected' : ''}>M3U8</option>
                </select>
            </td>
            <td><input type="text" placeholder="" value="${link || ''}" class="form-control" data-attr-name="link"></td>
            <td class="text-center">
                <button class="btn btn-outline-danger delete-episode cursor-pointer">Xóa</button>
            </td>
        </tr>`
}
$(".add-server-btn").click(function (e) {
  const serverCount = $('#episode-server-list').children('.nav-item').length;
  const serverName = $('#new-server-name').val();
  const templateList = (i, name) => {
    return `<li class="nav-item"><a class="nav-link episode-server" data-bs-toggle="tab" href="#episode-server-${i}"
                            role="tab" aria-controls="episode-server-${i}" aria-selected="true" contenteditable>${name}</a>
                    </li>`;
  }
  const templateData = (i, name) => {
    return `
            <div class="tab-pane" id="episode-server-${i}" role="tabpanel">
                <div class="form-inline justify-content-left mb-3 px-0">
                            <button type="button" class="btn btn-warning mr-2 add-episode-btn" data-server="${i}" data-server-name="${name}">
                                <i class="las la-plus"></i>
                                Thêm tập mới
                            </button>
                            <button type="button" class="btn btn-danger float-right delete-server">
                                <i class="las la-trash"></i>
                                Xóa server
                            </button>
                        </div>
                        <div class="table-responsive mb-3" style="max-height: 400px; overflow:auto;">
                            <table class="table table-bordered mb-4">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Type</th>
                                        <th>Link</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>`;
  }
  $('#episode-server-list').append(templateList(serverCount, serverName));
  $('#episode-server-data').append(templateData(serverCount, serverName));

  $('.episode-server[data-bs-toggle="tab"]').last().click();
})

$(document).on('click', '.add-episode-btn', function (e) {
  $(`#episode-server-${$(this).data('server')} table tbody`).append(templateEpisode($('.episode')
    .length, $(this).data('server-name')));
  updateNameAttr();
})
$(document).on('click', '.delete-episode', function (e) {
  $(this).closest('tr').remove();
  updateNameAttr();
})
$(document).on('click', '.delete-server', function (e) {
  const tab = $(this).closest('.tab-pane');
  const tabLink = $(`.nav-link[href="#${$(tab).attr('id')}"]`);
  $(tab).remove();
  $(tabLink).closest('.nav-item').remove();
  updateNameAttr();
  $('.episode-server[data-toggle="tab"]').last().click();
});