package com.example.demo;

import jakarta.validation.constraints.NotBlank;
import lombok.Data;

@Data
public class Syain {
	@NotBlank(message = "値を入力してください。")
	private String syain_id;
	private String name;
	private String age;
	private String gender;
	private String birth;
	private String mail;
	private String department1;
	private String department2;
}
