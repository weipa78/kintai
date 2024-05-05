package com.example.demo;

import jakarta.validation.constraints.NotBlank;
import lombok.Data;

@Data
public class Kihon {
	private int kihon_id;
	private String kihon_name;
	@NotBlank(message="契約開始日(年-月-日)を入力してください。")
	private String mei_st;
	@NotBlank(message="契約終了日(年-月-日)を入力してください。")
	private String mei_ed;
	private String kinmu_st;
	private String hiru_tm;
	private String kinmu_ed;
	private String hiru_st;
	private String hiru_ed;
	private String teiji_st;
	private String teiji_ed;
	private String teiji_tm;
	private String yoru_st;
	private String yoru_ed;
	private String yoru_tm;
	private String kizami;
	private int number;
}
