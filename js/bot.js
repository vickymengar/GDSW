// chatbot.js
document.getElementById('input').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        const message = event.target.value;
        event.target.value = '';
        displayMessage(message, 'user');
        getBotResponse(message);
    }
});

function displayMessage(message, sender) {
    const chatbox = document.getElementById('chatbox');
    const messageElement = document.createElement('div');
    messageElement.className = sender;
    messageElement.textContent = message;
    chatbox.appendChild(messageElement);
    chatbox.scrollTop = chatbox.scrollHeight; // Mantener el chat desplazado al fondo
}

let awaitingRemedy = false;
let lastCondition = '';

function getBotResponse(message) {
    let response = "Lo siento, no tengo información sobre eso. Por favor, consulta a un profesional de la salud.";

    // Respuestas básicas sobre salud y tratamiento
    if (message.toLowerCase().includes('hola') || message.toLowerCase().includes('buenas')) {
        response = '¡Hola! ¿Cómo puedo ayudarte hoy?\n\nAquí tienes algunas opciones sobre las que puedes preguntar:\n- Dolor de cabeza\n- Tos\n- Náuseas\n- Fiebre\n- Acidez estomacal\n- Dolor muscular\n- Dificultad para respirar\n- Síntomas generales\n- Qué tomar para [condición]\n- Estoy preocupado por [tema]';
    } else if (message.toLowerCase().includes('adiós') || message.toLowerCase().includes('bye')) {
        response = '¡Adiós! Espero haberte ayudado. No dudes en volver si tienes más preguntas.';
    } else if (awaitingRemedy) {
        if (message.toLowerCase().includes('sí') || message.toLowerCase().includes('si')) {
            response = getRemedy(lastCondition);
        } else {
            response = 'Está bien, si tienes más preguntas, no dudes en hacerlas.';
        }
        awaitingRemedy = false;
        lastCondition = '';
    } else {
        response = getConditionInfo(message);
        if (response !== "Lo siento, no tengo información sobre eso. Por favor, consulta a un profesional de la salud.") {
            awaitingRemedy = true;
            lastCondition = message.toLowerCase();
        }
    }

    displayMessage(response, 'bot');
}

function getConditionInfo(condition) {
    let response = "Lo siento, no tengo información sobre eso. Por favor, consulta a un profesional de la salud.";

    if (condition.includes('dolor de cabeza')) {
        response = 'El dolor de cabeza puede ser causado por una variedad de factores, incluyendo estrés, deshidratación, problemas de visión, falta de sueño o incluso factores ambientales como el ruido o la luz intensa. Los efectos pueden variar desde una molestia leve hasta un dolor intenso y pulsátil que puede dificultar la concentración y las actividades diarias. En algunos casos, puede estar acompañado de náuseas o sensibilidad a la luz y al sonido. ¿Te gustaría saber un remedio naturopático para el dolor de cabeza?';
    } else if (condition.includes('tos')) {
        response = 'La tos es un reflejo natural del cuerpo para despejar las vías respiratorias de moco, irritantes o partículas extrañas. Puede ser causada por infecciones virales como el resfriado común, infecciones bacterianas, alergias, asma o exposición a irritantes como el humo del cigarrillo. Los efectos de la tos pueden incluir irritación en la garganta, dificultad para dormir y, en algunos casos, dolor en el pecho. ¿Te gustaría saber un remedio naturopático para la tos?';
    } else if (condition.includes('náuseas')) {
        response = 'Las náuseas son una sensación incómoda en el estómago que a menudo precede al vómito. Pueden ser causadas por una amplia gama de factores, incluyendo infecciones virales, problemas digestivos, mareo por movimiento, estrés, ansiedad o efectos secundarios de medicamentos. Los efectos pueden incluir malestar estomacal, sudoración, salivación excesiva y, en casos severos, vómitos. ¿Te gustaría saber un remedio naturopático para las náuseas?';
    } else if (condition.includes('fiebre')) {
        response = 'La fiebre es una elevación temporal de la temperatura corporal, a menudo debido a una infección. Puede ser causada por infecciones bacterianas o virales, enfermedades inflamatorias, insolación o ciertos medicamentos. Los efectos de la fiebre incluyen escalofríos, sudoración, dolor de cabeza, debilidad y malestar general. Es una respuesta natural del cuerpo para combatir infecciones. ¿Te gustaría saber un remedio naturopático para la fiebre?';
    } else if (condition.includes('acidez estomacal')) {
        response = 'La acidez estomacal es una sensación de ardor en el pecho que suele ocurrir después de comer y puede ser causada por reflujo ácido, donde el ácido del estómago sube al esófago. Puede ser desencadenada por alimentos grasos, picantes, cítricos, cafeína, alcohol y comidas copiosas. Los efectos incluyen una sensación de ardor en el pecho y la garganta, regurgitación y malestar. ¿Te gustaría saber un remedio naturopático para la acidez estomacal?';
    } else if (condition.includes('dolor muscular')) {
        response = 'El dolor muscular, o mialgia, puede ser causado por una variedad de factores, incluyendo esfuerzo físico excesivo, tensión, lesiones, infecciones virales o bacterianas, y enfermedades crónicas como la fibromialgia. Los efectos incluyen dolor, rigidez y sensibilidad en los músculos, lo que puede afectar la movilidad y las actividades diarias. ¿Te gustaría saber un remedio naturopático para el dolor muscular?';
    } else if (condition.includes('congestión nasal')) {
        response = 'La congestión nasal es la obstrucción de las fosas nasales, a menudo causada por inflamación de los vasos sanguíneos en los senos nasales. Puede ser resultado de infecciones virales como el resfriado común, alergias, rinitis o sinusitis. Los efectos incluyen dificultad para respirar por la nariz, presión en la cara, dolor de cabeza y secreción nasal. ¿Te gustaría saber un remedio naturopático para la congestión nasal?';
    } else if (condition.includes('dolor de garganta')) {
        response = 'El dolor de garganta puede ser causado por infecciones virales o bacterianas, irritantes ambientales, alergias o uso excesivo de la voz. Los efectos incluyen dolor, irritación, sequedad y dificultad para tragar. En algunos casos, puede estar acompañado de fiebre, tos y ganglios linfáticos inflamados. ¿Te gustaría saber un remedio naturopático para el dolor de garganta?';
    }

    return response;
}

function getRemedy(condition) {
    let response = "Lo siento, no tengo un remedio naturopático para eso.";

    if (condition.includes('dolor de cabeza')) {
        response = 'Aquí tienes un remedio naturopático para el dolor de cabeza:\n- **Infusión de menta o manzanilla:** Prepara una infusión con hojas de menta o manzanilla y bébela lentamente. Estas hierbas pueden ayudar a aliviar la tensión y el dolor.\n- **Compresa fría:** Aplica una compresa fría en la frente durante 15-20 minutos para reducir la inflamación.\n\nRecuerda que es mejor acudir a un especialista si los síntomas persisten.';
    } else if (condition.includes('tos')) {
        response = 'Aquí tienes un remedio naturopático para la tos:\n- **Té de jengibre y miel:** Prepara un té con rodajas de jengibre fresco y añade una cucharadita de miel. El jengibre tiene propiedades antiinflamatorias y la miel puede suavizar la garganta.\n\nSi los síntomas persisten, es recomendable consultar a un especialista.';
    } else if (condition.includes('náuseas')) {
        response = 'Aquí tienes un remedio naturopático para las náuseas:\n- **Infusión de jengibre:** El jengibre es conocido por sus propiedades anti-náuseas. Prepara una infusión con jengibre fresco y bébela lentamente.\n- **Aceite esencial de menta:** Inhalar el aroma del aceite esencial de menta puede ayudar a calmar las náuseas.\n\nConsulta a un profesional si las náuseas continúan.';
    } else if (condition.includes('fiebre')) {
        response = 'Aquí tienes un remedio naturopático para la fiebre:\n- **Infusión de sauco:** Prepara una infusión con flores de sauco. Se cree que ayuda a sudar y reducir la fiebre.\n- **Baño tibio:** Toma un baño tibio para ayudar a regular la temperatura corporal.\n\nNo dudes en consultar a un médico si la fiebre es alta o no baja.';
    } else if (condition.includes('acidez estomacal')) {
        response = 'Aquí tienes un remedio naturopático para la acidez estomacal:\n- **Bicarbonato de sodio:** Mezcla una cucharadita de bicarbonato de sodio en un vaso de agua y bébelo para neutralizar el ácido.\n- **Jugo de aloe vera:** Beber un poco de jugo de aloe vera puede ayudar a calmar el estómago.\n\nSi persiste la acidez, busca la opinión de un profesional de la salud.';
    } else if (condition.includes('dolor muscular')) {
        response = 'Aquí tienes un remedio naturopático para el dolor muscular:\n- **Baño de sal de Epsom:** Añade sal de Epsom a un baño caliente y sumérgete durante 20 minutos. La sal de Epsom puede ayudar a relajar los músculos y reducir la inflamación.\n- **Aceite de árnica:** Aplica aceite de árnica en las áreas afectadas para aliviar el dolor muscular.\n\nRecuerda consultar a un especialista si el dolor no mejora.';
    } else if (condition.includes('congestión nasal')) {
        response = 'Aquí tienes un remedio naturopático para la congestión nasal:\n- **Inhalación de vapor:** Inhala el vapor de una olla con agua caliente y unas gotas de aceite esencial de eucalipto para despejar las vías respiratorias.\n- **Infusión de jengibre y miel:** Prepara una infusión con jengibre fresco y añade miel para aliviar la congestión.\n\nSi los síntomas persisten, consulta a un profesional de la salud.';
    } else if (condition.includes('dolor de garganta')) {
        response = 'Aquí tienes un remedio naturopático para el dolor de garganta:\n- **Gárgaras con agua salada:** Mezcla una cucharadita de sal en un vaso de agua tibia y haz gárgaras varias veces al día.\n- **Té con miel y limón:** Prepara un té con miel y limón para suavizar la garganta.\n\nSi el dolor persiste, consulta a un profesional de la salud.';
    }

    return response;
}
