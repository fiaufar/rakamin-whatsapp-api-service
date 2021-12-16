// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher("eb15b075d9c4b7393b60", {
    cluster: "ap1",
});

var channel = pusher.subscribe("channel-fiaufar");
channel.bind("fiaufar-event", function (data) {
    // console.log("DATA PUSHER", data);
    getChatList();
    getChatMessages(data.data.from);
    $(".chat_list").removeClass("active_chat");
    $(`.chat_list[from-id=${data.data.from}]`);
});

const BASE_URL = $("#base-url").val();
const API_CHAT_LIST = `${BASE_URL}/api/getChatList/`;
const API_MESSAGE = `${BASE_URL}/api/getMessage/`;
const API_SEND_MESSAGE = `${BASE_URL}/api/sendMessage/`;
const USER_ID = $("meta[name='user_id']").attr("content");

$(document).ready(function () {
    getChatList();
});

$(".inbox_chat").on("click", ".chat_list", function (e) {
    let fromId = $(this).attr("from-id");
    $(".chat_list").removeClass("active_chat");
    $(this).addClass("active_chat");
    getChatMessages(fromId);
});

$(".modal").on("click", ".chat_add", function (e) {
    let fromId = $(this).attr("from-id");
    let fromName = $(this).attr("from-name");
    generateChatList({ id: fromId, name: fromName });
});

$(".mesgs").on("click", ".msg_send_btn", function (e) {
    sendMessage();
});

$(".write_msg").keypress(function (e) {
    if (e.which == 13) {
        sendMessage();
        return false;
    }
});

function sendMessage() {
    let message = $(".write_msg").val();
    let to = $(".active_chat").attr("from-id");
    let chatData = {
        to: to,
        from: USER_ID,
        message: message,
    };

    $.post(API_SEND_MESSAGE, chatData, function (data) {
        console.log(data);
        generateMessageList(chatData);
        getChatMessages(to);
        let message = $(".write_msg").val("");
    });
}

function getChatMessages(fromId) {
    $.get(API_MESSAGE + fromId + "/" + USER_ID, function (data) {
        console.log(data);
        $(".msg_history").html("");
        data = data.reverse();
        for (const key in data) {
            generateMessageList(data[key]);
        }
    });
}

function getChatList() {
    $.get(API_CHAT_LIST + USER_ID, function (data) {
        console.log(data);
        data = data.reverse();
        for (const key in data) {
            generateChatList(data[key]);
        }
    });
}

function generateChatList(data) {
    let template = $("#template-chat").children(".chat_list").clone();

    let inboxChat = $(".inbox_chat");
    console.log($(`.chat_list[from-id=${data.id}]`).length);
    if ($(`.chat_list[from-id=${data.id}]`).length > 0) return;

    template.attr("from-id", data.id);
    template.find(".chat_ib h5").text(data.name);
    // template.find(".chat_ib p").text(data.message);
    inboxChat.append(template);
}

function generateMessageList(data) {
    console.log(data.to != USER_ID, data.to, USER_ID, data.message);
    let templateType = data.to == USER_ID ? ".incoming_msg" : ".outgoing_msg";
    let template = $("#template-chat").children(templateType).clone();

    let chatContainer = $(".msg_history");

    // template.attr("from-id", data.from);
    template.find("p").text(data.message);
    template.find(".time_date").text(data.send_at);
    chatContainer.append(template);
}
